<?php

namespace App\Models\Concerns;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;
use App\Contracts\likeable;


trait HasLikeable
{
    public function like(Likeable $likeable, $state = true)
    {

        // dd($this->id);
        // dd($likeable->dislikedBy($this));
        if ($like = $likeable->likes()->whereMorphedTo('userable', $this)->first() ) {
            // dd('inside');
            $like->update([
                'is_like' => $state
            ]);

            return;
        }else if($like = $likeable->dislikes()->whereMorphedTo('userable', $this)->first()){
            $like->update([
                'is_like' => $state
            ]);

            return;
        }

        app(Like::class)
            ->userable()->associate($this)
            ->likeable()->associate($likeable)
            ->fill([
                'is_like' => $state
            ])
            ->save();
    }

    public function unlike(Likeable $likeable)
    {
        $likeable->likes()
            ->whereMorphedTo('userable', $this)
            ->delete();
    }

    public function undislike(Likeable $likeable)
    {
        $likeable->dislikes()
            ->whereMorphedTo('userable', $this)
            ->delete();
    }
    public function dislike(Likeable $likeable)
    {
        

        $this->like($likeable, false);
    }
}