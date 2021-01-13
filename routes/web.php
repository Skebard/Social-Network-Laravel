<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RelationshipController;

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

//USERS
Route::get('/user/{username}',[UserController::class,'show']);
Route::get('/{username}/saved',[UserController::class,'savedPosts'])->middleware('auth');
// Route::get('/posts/saved',[UserController::class,'savedPosts']);
Route::get('/{username}/archived',[UserController::class,'archivedPosts'])->middleware('auth');
Route::get('/user/search/{text}',[UserController::class,'searchUsers']);

//RELATIONSHIPS
Route::get('/user/friend/add/{userId}',[RelationshipController::class,'sendFriendRequest']);



//POSTS
Route::get('/',[PostController::class,'home']);
Route::get('/posts',[PostController::class,'posts']);
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{postId}/edit',[PostController::class,'edit']);
Route::post('/posts/{postId}/update',[PostController::class,'update']);
Route::get('/api/posts/{postId}',[PostController::class,'singlePost']);
Route::get('/posts/{postId}',[PostController::class,'show']);
Route::get('/posts/{postId}/delete',[PostController::class,'destroy'])->middleware('auth');
Route::get('/posts/{postId}/archive',[PostController::class,'archive']);
Route::get('/posts/{postId}/restore',[PostController::class,'restore']);


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




Route::get('/homePage',function (){
    return view('homePage');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
