<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Relationship;
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
        $user = User::where('username', $username)->first();
        if (!$user) {
            return 'end';
        }
        $posts = Post::getUserPosts($user->id);
        $page = 'home';
        $relationshipA = Relationship::where('user_one_id', Auth::user()->id)
            ->where('user_two_id', $user->id);
        $relationship =  Relationship::where('user_one_id', $user->id)
            ->where('user_two_id', Auth::user()->id)
            ->union($relationshipA)
            ->first();
        $user->friends = Relationship::getFriendsRelationships($user->id);

        return view('profile.home', compact('user', 'posts', 'page', 'relationship'));
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
        if ($username !== $user->username) {
            return 'error';
        }
        $posts = Post::getSavedPosts();
        $page = 'saved';
        $relationshipA = Relationship::where('user_one_id', Auth::user()->id)
            ->where('user_two_id', $user->id);
        $relationship =  Relationship::where('user_one_id', $user->id)
            ->where('user_two_id', Auth::user()->id)
            ->union($relationshipA)
            ->first();
            $user->friends = Relationship::getFriendsRelationships($user->id);

        return view('profile.home', compact('posts', 'user', 'page', 'relationship'));
    }

    public function archivedPosts($username)
    {
        $user = Auth::user();
        if ($username !== $user->username) {
            return 'error';
        }
        $page = 'archived';
        $posts = Post::getDeletedPosts();
        $relationshipA = Relationship::where('user_one_id', Auth::user()->id)
            ->where('user_two_id', $user->id);
        $relationship =  Relationship::where('user_one_id', $user->id)
            ->where('user_two_id', Auth::user()->id)
            ->union($relationshipA)
            ->first();
            $user->friends = Relationship::getFriendsRelationships($user->id);

        return view('profile.home', compact('posts', 'user', 'page', 'relationship'));
    }

    public function searchUsers($text)
    {
        $a = User::where('name', 'LIKE', '%' . $text . '%');
        $b = User::where('last_name', 'LIKE', '%' . $text . '%');
        $users = User::where('username', 'LIKE', '%' . $text . '%')
            ->union($b)
            ->union($a)
            ->get();
        return json_encode((object)['status' => 1, 'users' => $users]);
    }

    public function showFriends($userId)
    {
        $profileFriends = Relationship::getFriends($userId);
        $loggedUserRelationships = Relationship::getRelationships(Auth::user()->id);
        return json_encode(['profileFriends'=>$profileFriends,'loggedUserRelationships'=>$loggedUserRelationships]);
    }
}
