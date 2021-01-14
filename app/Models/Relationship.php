<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Relationship extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'status',
        "action_user_id",
    ];


    public static function getFriends($userId)
    {
        $friendsA = Relationship::select('user_two_id')
                                ->where('user_one_id',$userId)
                                ->where('status',1);
        $friends = Relationship::select('user_one_id')
                                    ->where('user_two_id',$userId)
                                    ->where('status',1)
                                    ->union($friendsA)
                                    ->get();
        foreach($friends as $key=>&$friend){
            $users[]= User::find($friend->user_one_id);
        }
        return $users??[];
    }
    public static function getFriendsRelationships(int $userId)
    {
        return Relationship::where('user_one_id', $userId)
        ->where('status',1)
        ->orWhere('user_two_id', $userId)
        ->where('status',1)
        ->get();
    }
    public static function getRelationships(int $userId)
    {
        $relA = Relationship::where('user_one_id',$userId);
        return Relationship::where('user_two_id',$userId)
                    ->union($relA)
                    ->get();
    }
}
