<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\Post;
use Auth;
use Illuminate\Support\Carbon;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment($postId,Request $request)
    {
        //

        //!verify that the post belongs to the user or to a friend of the user

            $affectedRow = PostComment::insert([
                'user_id'=>Auth::user()->id,
                'post_id'=>$request->post_id,
                'comment'=>$request->comment,
                'published_at' =>Carbon::now(),
                'created_at' => Carbon::now(),
            ]);

        Post::addOneComment($request->post_id);

        if($affectedRow == 1){
            return json_encode((object)['status'=>1]);
        }
        return json_encode((object)['status'=>0]);
        //return Redirect()->back()->with('success','Comment added successfully');

    }


    public function removeComment($commentId)
    {
        PostComment::where('user_id',Auth::user()->id)
                    ->where('id',$commentId)->delete();
        return Redirect()->back()->with('success','Comment removed successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
