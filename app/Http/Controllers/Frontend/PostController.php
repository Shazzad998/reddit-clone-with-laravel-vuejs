<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostShowResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{

    public function show($community_slug, $slug, Request $request)
    {


        $community = Community::where('slug', $community_slug)->first();

        $community_post = Post::with(['comments', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->where('slug', $slug)->first();

        $post = new PostShowResource($community_post);

        $posts = PostResource::collection($community->posts()->orderBy('votes', 'DESC')->take(5)->get());

        $can_edit = $request->user()->can('update', $community_post);
        $can_delete = $request->user()->can('delete', $community_post);

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post', 'posts', 'can_edit', 'can_delete'));
    }
}
