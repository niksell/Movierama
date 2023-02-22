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

    
}
