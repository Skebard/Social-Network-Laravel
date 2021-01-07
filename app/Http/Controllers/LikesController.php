<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\LikedPost;
use Auth;
use Illuminate\Database\QueryException;

class LikesController extends Controller
{
    //

    public function likePost($postId)
    {
        try{
            LikedPost::insert([
                'user_id' => Auth::user()->id,
                'post_id' => $postId,
            ]);
            Post::addOneLike($postId);
            return  json_encode( (object) ['status' => 1]);
        }catch(QueryException $e){
            return  json_encode( (object) ['status' => 0]);

        }

    }

    public function removeLikePost($postId)
    {

        try {
            LikedPost::where('user_id', Auth::user()->id)
                ->where('post_id', $postId)
                ->delete();
            Post::removeOneLike($postId);
            return  json_encode( (object) ['status' => 1]);

        } catch (QueryException $ex) {
            return  json_encode( (object) ['status' => 0]);
        }
    }
}
