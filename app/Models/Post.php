<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PostImage;
use App\Models\SavedPost;
use Auth;


class Post extends Model
{
    //Default values
    const POST_LIMIT = 10;
    const POST_OFFSET = 0;

    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'status',
        "published_at",
        "likes",
        "comments",
    ];

    public static function getPost($postId)
    {
        $post = Post::find($postId);
        $post->images = PostImage::where('post_id', $postId)->get();
        return $post;
    }

    public static function getPosts(int $offset = self::POST_OFFSET, int $limit = self::POST_LIMIT)
    {
        //get self Id and friends' ids
        $sql_friends = 'SELECT user_two_id FROM relationships WHERE user_one_id = ' . Auth::user()->id;
        $sql_friends .= ' UNION SELECT user_one_id FROM relationships WHERE user_two_id = ' . Auth::user()->id;
        $sql_friends .= ' UNION SELECT ' . Auth::user()->id;

        $sql = ' SELECT posts.id,posts.user_id, posts.likes, posts.comments, posts.content, posts.published_at, users.username, users.profile_photo_path FROM posts ';
        $sql .= ' LEFT JOIN users';
        $sql .= ' ON posts.user_id = users.id';
        $sql .= ' WHERE posts.user_id IN ( ' . $sql_friends . ' ) AND posts.deleted_at IS NULL ';
        $sql .= ' ORDER BY posts.published_at DESC';
        $sql .= ' LIMIT ' . $limit . ' OFFSET ' . $offset;
        $posts = DB::select(DB::raw($sql), array());
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
        return $posts;
    }

    public static function getUserPosts($userId)
    {
        $posts = Post::where('user_id', $userId)->orderByDesc('published_at')->get();
        foreach ($posts as $key => $post) {
            self::getPostData($post);
        }
        return $posts;
    }
    public static function addOneComment(int $postId)
    {
        $sql = 'UPDATE posts SET comments = comments + 1 WHERE id =' . $postId;
        DB::update(DB::raw($sql), []);
    }
    public static function addOneLike(int $postId)
    {
        $sql = 'UPDATE posts SET likes = likes + 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
    }

    public static function removeOneLike(int $postId)
    {
        $sql = 'UPDATE posts SET likes = likes - 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
    }
    public static function removeOneComment(int $postId)
    {
        $sql = 'UPDATE posts SET comments = comments - 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
    }

    public static function getSavedPosts()
    {
        $userId = Auth::user()->id;

        $savedPosts = SavedPost::where('user_id', $userId)->get();
        foreach ($savedPosts as $savedPost) {
            $posts[] = Post::find($savedPost->post_id);
        }
        foreach ($posts as $key => $post) {
            self::getPostData($post);
        }
        return $posts;
    }

    public static function getDeletedPosts()
    {
        $userId = Auth::user()->id;
        $posts = Post::onlyTrashed()->where('user_id',$userId)->get();

        foreach ($posts as $key => $post) {
            self::getPostData($post);
        }
        return $posts;
    }
    public static function getPostData(&$post)
    {
        $post->images = PostImage::where('post_id', $post->id)->get();
        $post->comments = PostComment::where('post_id', $post->id)->get();
        $post->userLike = LikedPost::where('post_id', $post->id)
            ->where('user_id', Auth::user()->id)
            ->get();
        $post->saved = SavedPost::where('post_id', $post->id)
            ->where('user_id', Auth::user()->id)
            ->get();
    }
}
