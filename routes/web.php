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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/indexMy', function () {
    return view('home.index');
});

Route::resource('/{username}/posts',PostController::class);

Route::resource('/{postId}/postComments',PostCommentController::class);


//Posts
Route::get('/',[PostController::class,'index1']);
Route::get('/posts',[PostController::class,'posts']);


//Save post
Route::get('/{postId}/save',[PostController::class,'savePost']);
Route::get('/{postId}/save/remove',[PostController::class,'removeSavedPost']);


//Comment Post
Route::post('/{postId}/comment',[PostCommentController::class,'addComment']);
Route::get('/{postId}/comment/remove',[PostCommentController::class,'removeComment']);

//Like posts
Route::get('/{postId}/like',[LikesController::class,'likePost']);
Route::get('/{postId}/like/remove',[LikesController::class,'removeLikePost']);


Route::get('/homePage',function (){
    return view('homePage');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
