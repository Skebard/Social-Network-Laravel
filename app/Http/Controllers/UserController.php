<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;
class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //
        $user = User::where('username',$username)->first();
        if(!$user){
            return 'end';
        }
        $posts = Post::getUserPosts($user->id);
        $page='home';
        return view('profile.home',compact('user','posts','page'));
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


    public function savedPosts($username)
    {
        $user = Auth::user();
        if($username !== $user->username){
            return 'error';
        }
        $posts = Post::getSavedPosts();
        $page = 'saved';
        return view('profile.home',compact('posts','user','page'));
    }

    public function archivedPosts($username)
    {
        $user = Auth::user();
        if($username !== $user->username){
            return 'error';
        }
        $page = 'archived';
        $posts = Post::getDeletedPosts();
        return view('profile.home',compact('posts','user','page'));
    }
}