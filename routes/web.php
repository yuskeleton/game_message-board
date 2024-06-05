<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(ReviewController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/reviews', 'store')->name('store');
    Route::post('/reviews/{review}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/reviews/create', 'create')->name('create');
    Route::get('/reviews/{review}', 'show')->name('show');
    Route::put('/reviews/{review}', 'update')->name('update');
    Route::delete('/reviews/{review}', 'delete')->name('delete');
    Route::get('/reviews/{review}/edit', 'edit')->name('edit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::get('/comments', 'index')->name('index');
    Route::post('/comments', 'store')->name('store');
    Route::get('/comments/create', 'create')->name('create');
    Route::get('/comments/{comment}', 'show')->name('show');
    Route::put('/comments/{comment}', 'update')->name('update');
    Route::delete('/reviews/{review}/comments/{comment}', 'delete')->name('delete');
    Route::get('/comments/{comment}/edit', 'edit')->name('edit');
});

Route::controller(LikeController::class)->middleware(['auth'])->group(function(){
    Route::post('/reviews/{review}/like', 'likeReview')->name('likeReview');
    Route::post('/reviews/{review}/unlike', 'unlikeReview')->name('unlikeReview');
});




require __DIR__.'/auth.php';
