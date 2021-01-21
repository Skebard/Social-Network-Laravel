<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RelationshipController;
//use Auth;

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






//TESTS
Route::get('/register',function(){
    return view('auth.register');
})->name('register')->middleware('guest');


//USERS

Route::get('/{username}/saved',[UserController::class,'savedPosts'])->middleware('verifyAccountOwner');
// Route::get('/posts/saved',[UserController::class,'savedPosts']);
Route::get('/{username}/archived',[UserController::class,'archivedPosts'])->middleware('verifyAccountOwner');
Route::get('/user/search/{text}',[UserController::class,'searchUsers']);
Route::get('/user/friends/search/{text}',[UserController::class,'searchUsersFriends']);
Route::get('/user/{userId}/friends',[UserController::class,'showFriends']);
Route::get('/notifications',[UserController::class,'showNotifications']);
Route::get('/user/{username}',[UserController::class,'show']);
//ACCOUNT
Route::get('/accounts/edit',[UserController::class,'edit']);
Route::get('/accounts/password',[UserController::class,'editPassword']);
Route::put('/accounts/privacy/update',[UserController::class,'updatePrivacy']);
Route::put('/accounts/photo/update',[UserController::class,'updateProfilePhoto']);


//RELATIONSHIPS
Route::get('/user/friend/add/{userId}',[RelationshipController::class,'sendFriendRequest']);
Route::get('/user/friend/accept/{userId}',[RelationshipController::class,'acceptRequest']);
Route::get('/user/friend/decline/{userId}',[RelationshipController::class,'declineRequest']);
Route::get('/user/friend/remove/{userId}',[RelationshipController::class,'removeFriend']);
//we can use the same function as for removing a  friend
Route::get('/user/friend/cancelRequest/{userId}',[RelationshipController::class,'removeFriend']);
Route::get('/user/block/{userId}',[RelationshipController::class,'blockUser']);
Route::get('/user/unblock/{userId}',[RelationshipController::class,'removeFriend']);




//POSTS
Route::get('/',[PostController::class,'home']);
Route::get('/posts',[PostController::class,'posts']);
Route::post('/posts',[PostController::class,'store']);
Route::post('/posts/{postId}/update',[PostController::class,'update']);
Route::get('/api/posts/{postId}',[PostController::class,'singlePost']);
Route::get('/posts/{postId}',[PostController::class,'show']);
Route::get('/posts/{postId}/delete',[PostController::class,'destroy'])->middleware('auth');
Route::get('/posts/{postId}/archive',[PostController::class,'archive']);
Route::get('/posts/{postId}/restore',[PostController::class,'restore']);





//Save post
Route::get('/{postId}/save',[PostController::class,'savePost']);
Route::get('/{postId}/save/remove',[PostController::class,'removeSavedPost']);


//Comment Post
Route::post('/{postId}/comment',[PostCommentController::class,'addComment']);
Route::get('/{postId}/comment/remove',[PostCommentController::class,'removeComment']);

//Like posts
Route::get('/{postId}/like',[LikesController::class,'likePost']);
Route::get('/{postId}/like/remove',[LikesController::class,'removeLikePost']);

Route::fallback(function () {
    if(Auth::check()){
        return view("error");
    }else{
        return Redirect()->route('login');
    }


});
