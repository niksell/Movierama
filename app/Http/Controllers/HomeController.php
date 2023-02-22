<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use App\Models\Like;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
class HomeController extends Controller
{
    //

    public function home(Request $request): View
    {


        // ,'movies'=>$request->user()->$author->posts÷
        return view('welcome', [
             'movies'=>Movie::all(),

        ]);
    }

    public function userMovies(Request $request,$id): View
    {
        $user= User::findOrfail($id);

        // ,'movies'=>$request->user()->$author->posts÷
        return view('welcome', [
             'movies'=>$user->movies()->get(),

        ]);
    }
    public function sort(Request $request,$sort): View
    {

        if($sort=="date"){
            return view('welcome', [
                'movies'=>Movie::orderBy('created_at', 'desc')->get(),
   
           ]);
        }elseif($sort=='like'){
            //dd(Movie::withCount(['likes'])->orderBy('likes_count', 'desc')->get());//->orderBy('last_name', 'desc')->paginate()
            return view('welcome', [
                'movies'=>Movie::withCount(['likes'])->orderBy('likes_count', 'desc')->get(),
   
           ]);
        }elseif($sort=='hates'){
            return view('welcome', [
                'movies'=>Movie::withCount(['dislikes'])->orderBy('dislikes_count', 'desc')->get(),
   
           ]);
        }
        // ,'movies'=>$request->user()->$author->posts÷
        
    }
    
    
}
