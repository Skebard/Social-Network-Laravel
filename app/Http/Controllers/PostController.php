<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Hashing\BcryptHasher;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;
use App\Models\LikedPost;
use App\Models\SavedPost;
use App\Models\PostComment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use stdClass;

class PostController extends Controller
{

    // $this->middleware('auth')->except(['show']);

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }


    public function home()
    {
        return view('home.index');
    }

    public function posts()
    {

        if (isset($_GET['limit'], $_GET['offset'])) {
            $offset = intval($_GET['offset']);
            $limit = intval($_GET['limit']);
            $posts = Post::getPosts($offset, $limit);
        } else {
            $posts = Post::getPosts();
        }

        foreach ($posts as $key => &$post) {

            //get post images
            if ($post->profile_photo_path == '') {
                $post->profile_photo_path = 'images/users/defaultProfileImage.png';
            }
            $images = PostImage::where('post_id', $post->id)->get();
            $post->images = $images;

            $post->userLike = LikedPost::where('post_id', $post->id)
                ->where('user_id', Auth::user()->id)
                ->get();
            $post->saved = SavedPost::where('post_id', $post->id)
                ->where('user_id', Auth::user()->id)
                ->get();
            $post->numComments = $post->comments;
            $post->comments = PostComment::where('post_id', $post->id)->orderByDesc('published_at')->get();
            foreach ($post->comments as &$comment) {
                $comment->username  = User::select('username')
                    ->where('id', $comment->user_id)
                    ->first()->username;
            }
        }

        $status = 1;
        if (count($posts) === 0) {
            $status = 2;    //indicates that there are no more results
        }
        $postsView = view('home.posts', compact('posts'));
        return json_encode((object) ['status' => $status, 'data' => strval($postsView), 'count' => count($posts)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
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
        $images = $request->file('image');
        if (file_exists('images/posts/slider2.jpg')) {
            echo 'exists';
        }
        echo $request->content;

        Post::insert([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'status' => 0,
            'likes' => 0,
            'comments' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        $postId = DB::getPdo()->lastInsertId();

        $img_position = 1;

        if ($images) {
            foreach ($images as $image) {
                echo 'ANOTHER IMAGE   ';
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $img_name = $name_gen . '.' . $img_ext;
                $up_location = 'images/posts/';
                $img_location = $up_location . $img_name;
                $image->move($up_location, $img_name);

                PostImage::insert([
                    'post_id' => $postId,
                    'image' => $img_location,
                    'position' => $img_position++,
                    'created_at' => Carbon::now(),
                ]);
            }
        }


        return Redirect()->back()->with('success', 'Post created successfully');
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
    public function destroy($postId)
    {
        try {
            $deletedPost = Post::where('user_id', Auth::user()->id)
                ->where('id', $postId)
                ->delete();
            if ($deletedPost > 0) {
                return  Redirect()->back()->with('error', 'Post could not be deleted ');
            } else {
                return  Redirect()->back()->with('success', 'Post deleted successfully');
            }
        } catch (QueryException $e) {
            return  Redirect()->back()->with('error', 'Error ocurred, post has not been deleted');
        }
    }

    public function softDelete($id)
    {
        //$delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Soft Delete Successfully');
    }

    public function restore($id)
    {
        //$delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restored Successfully');
    }

    public function pdelete($id)
    {
        //$delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Permanently Deleted');
    }


    public function savePost($postId)
    {

        try {
            SavedPost::insert([
                'user_id' => Auth::user()->id,
                'post_id' => $postId,
            ]);
            return  json_encode((object) ['status' => 1]);
        } catch (QueryException $e) {
            return  json_encode((object) ['status' => 0]);
        }
    }

    public function removeSavedPost($postId)
    {
        try {
            SavedPost::where('user_id', Auth::user()->id)
                ->where('post_id', $postId)
                ->delete();
            return  json_encode((object) ['status' => 1]);
        } catch (QueryException $e) {
            return  json_encode((object) ['status' => 0]);
        }
    }
}
