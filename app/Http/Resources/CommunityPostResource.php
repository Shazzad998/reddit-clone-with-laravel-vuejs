<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommunityPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->user->username,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'votes' => $this->votes,
            'postVotes' => $this->whenLoaded('postVotes'),
            'community' => $this->community,
            'comments' => $this->comments_count

        ];
    }
}
