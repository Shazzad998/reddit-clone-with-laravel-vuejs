<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Http\Requests\CommunityUpdateRequest;
use App\Models\Community;
use Inertia\Inertia;

class CommunityController extends Controller
{

    public function index()
    {
        $communities = Community::where('user_id', auth()->id())->paginate(10)->through(fn ($community) => [
            'id' => $community->id,
            'name' => $community->name,
            'slug' => $community->slug
        ]);
        return Inertia::render('Communities/Index', compact('communities'));
    }


    public function create()
    {
        return Inertia::render('Communities/Create');
    }


    public function store(CommunityStoreRequest $request)
    {
        Community::create($request->validated() + ['user_id' => auth()->id()]);

        return to_route('communities.index')->with('message', 'Community created successfully');
    }


    public function edit(Community $community)
    {
        $this->authorize('update', $community);
        return Inertia::render('Communities/Edit', compact('community'));
    }


    public function update(CommunityUpdateRequest $request, Community $community)
    {
        $this->authorize('update', $community);

        $community->update($request->validated());

        return to_route('communities.index')->with('message', 'Community updated successfully');
    }


    public function destroy(Community $community)
    {
        $this->authorize('delete', $community);

        $community->delete();
        return back()->with('message', 'Community deleted successfully');
    }
}
