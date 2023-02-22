<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sort/{sort}', [HomeController::class, 'sort']);
Route::get('/movies/{id}', [HomeController::class, 'userMovies']);
// Route::get('/sort_by_date', [HomeController::class, 'sdate'])
// Route::get('/sort_by_likes', [HomeController::class, 'slike'])
// Route::get('/sort_by_dislikes', [HomeController::class, 'sdid'])

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/movies', [MovieController::class, 'create'])->name('movie.edit');
    Route::post('/movies', [MovieController::class, 'save'])->name('movie.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/like/{id}', [LikeController::class, 'like'])->name('like');
    Route::post('/dislike/{id}', [LikeController::class, 'dislike'])->name('dislike');
    Route::delete('/like', [LikeController::class, 'unlike'])->name('unlike');
});



require __DIR__.'/auth.php';
