<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovieUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Movie;
use App\Models\Like;

use Illuminate\View\View;

class LikeController extends Controller
{

    public function like(Request $request, $id)
    {
        $movie=Movie::findOrfail($id);
        // dd(auth()->user());
        // dd($movie->likedBy(auth()->user()));
        if($movie->likedBy(auth()->user())){
            // dd("here");
            auth()->user()->unlike($movie);

            return redirect()->back();
        }
        auth()->user()->like($movie);

        // return response()->json(['message' => 'Success']);
        return redirect()->back();
    }

    public function unlike(Request $request, Movie $movie)
    {
        auth()->user()->unlike($movie);

        return redirect()->back();
    }
    public function dislike(Request $request, $id)
    {
        $movie=Movie::findOrfail($id);
        // dd($movie->dislikedBy(auth()->user()));
        if($movie->dislikedBy(auth()->user())){
            auth()->user()->undislike($movie);

            return redirect()->back();
        }
        auth()->user()->dislike($movie);

        return redirect()->back();
    }
    
}