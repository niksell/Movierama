<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Concerns\HasLikes;
use App\Contracts\likeable;

class Movie extends Model implements likeable
{
    use HasFactory;
    use HasLikes;
    protected $fillable = [
        'title',      
        'description',
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Determine if the post has been liked by a specific user.
     *
     * @param  null|\App\User  $user
     * @return bool
     */
    public function likedBy(?User $user)
    {
        if (is_null($user)) {
            return false;
        }

        return $this->likes()->where('userable_id', $user->id)->exists();
    }


    public function dislikedBy(?User $user)
    {
        if (is_null($user)) {
            return false;
        }

        // dd($this->dislikes()->get());
        return $this->dislikes()->where('userable_id', $user->id)->exists();
    }
}
