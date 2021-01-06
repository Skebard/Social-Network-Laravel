<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;


class Post extends Model
{
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

    public static function getPosts(int $offset, int $limit){
        //get self Id and friends' ids
        $sql_friends ='SELECT user_two_id FROM relationships WHERE user_one_id = '.Auth::user()->id;
        $sql_friends .= ' UNION SELECT user_one_id FROM relationships WHERE user_two_id = '.Auth::user()->id;
        $sql_friends .= ' UNION SELECT '.Auth::user()->id;

        $sql =' SELECT posts.id,posts.user_id, posts.content, posts.published_at, users.username FROM posts LEFT JOIN users ';
        $sql .= ' ON posts.user_id = users.id';
        $sql .= ' WHERE posts.user_id IN ( '.$sql_friends.' ) ORDER BY posts.published_at DESC';
        $sql .= ' LIMIT '.$limit.' OFFSET '.$offset;
        $results = DB::select( DB::raw($sql), array());
        return $results;
    }
}
