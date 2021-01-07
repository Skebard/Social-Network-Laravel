<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Hashing\BcryptHasher;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\LikedPost;
use App\Models\SavedPost;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;




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
        echo 'HI <br>';
        // $data  = Post::where('user_id',1)->get();
        $posts = Post::getPosts(2,4);
        //var_dump($data->content);
        foreach( $posts as $key => &$post){
            echo '<h1>'.$post->username.'</h1>';
            echo $post->content;
            echo '<br>';

            //get post images
            $images = PostImage::where('post_id',$post->id)->get();
            foreach($images as $key => $value){
                echo $value;
                echo "<br>";
            }
            $post->images = $images;

            $post->userLike = LikedPost::where('post_id',$post->id)
                                    ->where('user_id',Auth::user()->id)
                                    ->get();
            $post->saved = SavedPost::where('post_id',$post->id)
                                        ->where('user_id',Auth::user()->id)
                                        ->get();
            
        }
         var_dump($posts[1]->images[0]->image);
        return view('home.posts',compact('posts'));
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
        $images = $request->file('image');
        if(file_exists('images/posts/slider2.jpg')){
            echo 'exists';
        }
        echo $request->content;

        Post::insert([
            'user_id'=>Auth::user()->id,
            'content'=>$request->content,
            'status'=>0,
            'likes'=>0,
            'comments'=>0,
            'published_at'=>Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        $postId=DB::getPdo()->lastInsertId();
        echo 'last ID' . $postId ."            /";


        $img_position= 1;
        foreach ($images as $image) {
            echo 'ANOTHER IMAGE   ';
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'images/posts/';
            $img_location = $up_location . $img_name;
            $image->move($up_location, $img_name);

        PostImage::insert([
            'post_id'=>$postId,
            'image'=>$img_location,
            'position'=> $img_position++,
            'created_at' => Carbon::now(),
        ]);
        }

        return Redirect()->back()->with('success','Post created successfully');
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


    public function savePost($postId)
    {

        try{
            SavedPost::insert([
                'user_id'=>Auth::user()->id,
                'post_id'=>$postId,
            ]);
            return  json_encode( (object) ['status' => 1]);
        }catch(QueryException $e){
            return  json_encode( (object) ['status' => 0]);
        }
    }

    public function removeSavedPost($postId)
    {
        try{
            SavedPost::where('user_id',Auth::user()->id)
            ->where('post_id',$postId)
            ->delete();
            return  json_encode( (object) ['status' => 1]);
        }catch(QueryException $e){
            return  json_encode( (object) ['status' => 0]);
        }

    }

}
