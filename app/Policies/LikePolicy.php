<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Movie;
class LikePolicy
{
    /**
     * Determine if the given post can be liked by the user.
     */
    public function like(User $user, Movie $movie): bool
    {
        return $user->id === $movie->user_id;
    }

}
