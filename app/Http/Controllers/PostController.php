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
use Illuminate\Support\Facades\Validator;
use Image;
use stdClass;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }


    public function home()
    {
        return view('home.index');
    }

    public function singlePost($postId)
    {
        return json_encode(Post::getPost($postId));
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
        $status = 1;
        if (count($posts) === 0) {
            $status = 2;    //indicates that there are no more results
        }
        $postsView = view('home.posts', compact('posts'));
        return json_encode((object) ['status' => $status, 'data' => strval($postsView), 'count' => count($posts)]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'content' => 'required',
                'image.*' => 'image',
            ],
            [
                'image.*.image' => 'Only images can be uploaded',
                'content.required' => 'A post description is required',
            ]
        );

        if ($validator->fails()) {
            return Redirect()->back()->with('error', $validator->errors()->first());
        }

        $images = $request->file('image');
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
                if($image->getSize()>500000){
                    $errorImages = true;
                    continue;
                }
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $img_name = $name_gen . '.' . $img_ext;
                $up_location = 'images/posts/';
                $img_location = $up_location . $img_name;
                //default image size
                //$image->move($up_location, $img_name);

                //change image size so all the images have the same
                Image::make($image)->fit(550, 550, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($img_location);

                PostImage::insert([
                    'post_id' => $postId,
                    'image' => $img_location,
                    'position' => $img_position++,
                    'created_at' => Carbon::now(),
                ]);
            }
        if(isset($errorImages)){
            return Redirect()->back()->with('error','Some of your images are too big. Please be sure that each of your images do not exceed the 500Kb limit.');

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
        $post = Post::find($id);
        if (!$post) {
            $message = 'Post does not exists or it is not available. Try to restore it.';
            return view('error',compact('message'));
        }
        Post::getPostData($post);
        $user = User::find($post->user_id);
        $relatedPosts = Post::getUserPosts($post->user_id);
        if ($user->profile_photo_path == '') {
            $user->profile_photo_path = 'images/users/defaultProfileImage.png';
        }
        return view('posts.index', compact('post', 'user', 'relatedPosts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'content' => 'required',
                'image.*' => 'image',
            ],
            [
                'image.*.image' => 'Only images can be uploaded',
                'content.required' => 'A post description is required',
            ]
        );


        if ($validator->fails()) {
            return json_encode(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        Post::where('user_id', Auth::user()->id)
            ->where('id', $postId)
            ->update([
                'updated_at' => Carbon::now(),
                'content' => $request->content
            ]);
        $images = json_decode($request->images);
        $srcImage = [];
        $img_position = 1;
        $filesPos = 0;
        $imagesFiles = $request->file('imagesFiles');
        $imagesFilesToInsert = [];
        foreach ($images as $image) {
            if ($image->type === 'file') {
                //store new images
                if($imagesFiles[$filesPos]->getSize()>500000){
                    $errorImages = true;
                    continue;
                }
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($imagesFiles[$filesPos]->getClientOriginalExtension());
                $img_name = $name_gen . '.' . $img_ext;
                $up_location = 'images/posts/';
                $img_location = $up_location . $img_name;
                //$imagesFiles[$filesPos]->move($up_location, $img_name);
                Image::make($imagesFiles[$filesPos])->fit(550, 550, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($img_location);
                $filesPos++;

                //we have to insert them after we update and delete the existing images
                //or they will not be added since post_id and image combination are unique

            } else {

                $storedImage = substr($image->image, strpos($image->image, 'images/posts'));
                $srcImage[] = $storedImage;
                $img_location = $storedImage;
            }
            $imagesFilesToInsert[] = [
                'post_id' => $postId,
                'image' => $img_location,
                'position' => $img_position,
                'created_at' => Carbon::now(),
            ];
            $img_position++;
        }
        //delete old images
        $oldImages = PostImage::where('post_id', $postId)->get();
        foreach ($oldImages as $image) {
            if (file_exists(public_path() . '/' . $image->image)) {
                unlink(public_path() . '/' . $image->image);
            }
        }
        PostImage::where('post_id', $postId)->delete();
        foreach ($imagesFilesToInsert as $image) {
            PostImage::insert($image);
        }
        if(isset($errorImages)){
            return json_encode((object) ['status' => 0,'message'=>'Some of your images are too big. Please be sure that each of your images do not exceed the 500Kb limit.']);
        }
        return json_encode((object) ['status' => 1]);
    }

    public function archive($postId)
    {
        try {
            $deletedPost = Post::where('user_id', Auth::user()->id)
                ->where('id', $postId)
                ->delete();
            if ($deletedPost > 0) {
                return  Redirect('/' . Auth::user()->username . '/archived')->with('success', 'Post archived successfully');
            } else {
                return  Redirect()->back()->with('error', 'Post could not be deleted ');
            }
        } catch (QueryException $e) {
            return  Redirect()->back()->with('error', 'Error ocurred, post has not been deleted');
        }
    }

    public function destroy($postId)
    {
        //delete old images
        $oldImages = PostImage::where('post_id', $postId)->get();
        foreach ($oldImages as $image) {
            if (file_exists(public_path() . '/' . $image->image)) {
                unlink(public_path() . '/' . $image->image);
            }
        }
        Post::
        where('user_id', Auth::user()->id)
        ->find($postId)
        ->forceDelete();
        return  Redirect()->back()->with('success', 'Post deleted successfully');
    }


    public function restore($id)
    {
        $affected = Post::withTrashed()
            ->where('user_id', Auth::user()->id)
            ->find($id)
            ->restore();
        return Redirect('/user/' . Auth::user()->username)->with('success', 'Post Restored Successfully');
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
