<?php

namespace App\Policies;

use App\Models\Community;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommunityPolicy
{
    use HandlesAuthorization;


    public function update(User $user, Community $community)
    {
        return $user->id === $community->user_id;
    }



    public function delete(User $user, Community $community)
    {
        return $user->id === $community->user_id;
    }
}
