<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relationship;
use App\Models\User;
use Illuminate\Database\QueryException;

use Auth;

class RelationshipController extends Controller
{
    //

    public function sendFriendRequest($userId)
    {
        //! verify that it is not the user himself
        //! verify that the $userId exists
        try{
            Relationship::insert([ 'user_one_id'=>Auth::user()->id,
            'user_two_id'=>$userId,
            'status'=>0,         //0 = pending request
            'action_user_id'=>Auth::user()->id,
            ]);
        }catch(QueryException $e){
            return  Redirect()->back()->with('error', 'Request could not be sent');
        }
        return Redirect()->back()->with('success','Request has been sent');
    }
}
