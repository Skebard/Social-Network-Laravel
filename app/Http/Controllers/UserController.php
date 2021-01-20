<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Relationship;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            $message = 'The user you are looking for does not exist.';
            return view('error',compact('message'));
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
        $user->numPosts = $posts->count();
        return view('profile.home', compact('user', 'posts', 'page', 'relationship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $user = Auth::user();
        return view('account.index',compact('user'));
    }


    public function editPassword()
    {
        return view ('account.index');
    }

    public function updatePrivacy(Request $request)
    {
        if(!isset($request->private)){
            return json_encode(['status'=>0]);
        }
        $user = User::find(Auth::user()->id);
        $user->privacy =$request->private;
        $user->save();
        return json_encode(['status'=>1]);
    }
    public function updateProfilePhoto(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'profile_photo' => 'required|image',
        ]);
        if ($validator->fails()) {
            return Redirect()->back()->with('error','Something went wrong.');
        }
        $user = User::find(Auth::user()->id);
        $image = $request->file('profile_photo');
        if(!$image){
            return Redirect()->back()->with('error','Something went wrong.');

        }
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'images/users/';
        $img_location = $up_location . $img_name;
        $image->move($up_location, $img_name);
        $user->profile_photo_path = $img_location;
        $user->save();
        $user->touch();
        return Redirect()->back()->with('success','Image successfully updated.');

    }


    public function savedPosts($username)
    {
        $user = Auth::user();
        if ($username !== $user->username) {
            return view('error');
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
        $user->numPosts = Post::where('user_id',$user->id)
                                ->get()
                                ->count();
        return view('profile.home', compact('posts', 'user', 'page', 'relationship'));
    }

    public function archivedPosts($username)
    {
        $user = Auth::user();
        if ($username !== $user->username) {
            return view('error');
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
            $user->numPosts = Post::where('user_id',$user->id)
            ->get()
            ->count();
        return view('profile.home', compact('posts', 'user', 'page', 'relationship'));
    }

    public function searchUsers(string $text)
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

    public function searchUsersFriends(string $text)
    {
        $friends = Relationship::getFriendsRelationships(Auth::user()->id);
        $friends = $friends->all();
        $friendsId = array_map(fn ($friend)=>$friend->user_one_id===Auth::user()->id ?$friend->user_two_id:$friend->user_one_id,$friends);

        $a = User::where('name', 'LIKE', '%' . $text . '%')
                    ->whereIn('id',$friendsId);
        $b = User::where('last_name', 'LIKE', '%' . $text . '%')
                    ->whereIn('id',$friendsId);
        $users = User::where('username', 'LIKE', '%' . $text . '%')
                    ->whereIn('id',$friendsId)
                    ->union($b)
                    ->union($a)
                    ->get();
        return json_encode(['status'=>1,'users'=>$users]);
    }

    public function showNotifications()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('notifications');
    }


}
