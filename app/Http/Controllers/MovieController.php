<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovieUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Movie;
use Illuminate\View\View;

class MovieController extends Controller
{
    //
    public function create(Request $request): View
    {
        // ,'movies'=>$request->user()->$author->posts÷
        return view('movie.edit', [
            'user' => $request->user() , 'movies'=>Auth::user()->movies,

        ]);
    }

    public function save(MovieUpdateRequest $request): RedirectResponse
    {
        $req = array("title"=>($request->title),
            "description"=> trim($request->desc));
        $movie = new Movie($req);
        $user = Auth::user();
        //dd($article);

        $user->addMovie(
            $movie,$user->id
        );
        return Redirect::route('movie.edit')->with('status', 'movie-created');
    }

}
