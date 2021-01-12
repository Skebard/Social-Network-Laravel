<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\LikesController;

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




//Route::resource('/posts',PostController::class);

//Route::resource('/{postId}/postComments',PostCommentController::class);


//Posts
Route::get('/',[PostController::class,'home']);
Route::get('/posts',[PostController::class,'posts']);
Route::get('/posts/{postId}/delete',[PostController::class,'destroy'])->middleware('auth');
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{postId}/archive',[PostController::class,'archive']);
Route::get('/posts/{postId}/edit',[PostController::class,'edit']);
Route::post('/posts/{postId}/update',[PostController::class,'update']);
Route::get('/posts/{postId}',[PostController::class,'singlePost']);


Route::get('/tests',function(){
    return view('tests');
});

//Save post
Route::get('/{postId}/save',[PostController::class,'savePost']);
Route::get('/{postId}/save/remove',[PostController::class,'removeSavedPost']);


//Comment Post
Route::post('/{postId}/comment',[PostCommentController::class,'addComment']);
Route::get('/{postId}/comment/remove',[PostCommentController::class,'removeComment']);

//Like posts
Route::get('/{postId}/like',[LikesController::class,'likePost']);
Route::get('/{postId}/like/remove',[LikesController::class,'removeLikePost']);


//Profile
Route::get('/{username}',function($id){
    return view('profile.home');
});

Route::get('/homePage',function (){
    return view('homePage');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
