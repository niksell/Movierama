<?php

namespace App\Models\Concerns;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;
use App\Contracts\likeable;


trait HasLikes
{
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable')->where('is_like', true);
    }
    public function dislikes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable')->where('is_like', false);
    } 
}