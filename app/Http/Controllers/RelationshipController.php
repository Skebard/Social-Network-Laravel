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
        //! verify that a relationship between both users does not exist
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

    public function acceptRequest($userId)
    {
        $relationshipA = Relationship::where('user_one_id',Auth::user()->id)
        ->where('user_two_id',$userId);
        $relationship =  Relationship::where('user_one_id',$userId)
        ->where('user_two_id',Auth::user()->id)
        ->union($relationshipA)
        ->update(['status'=>1,
                'action_user_id'=>Auth::user()->id]);
        return Redirect()->back()->with('success','Friend added');
    }

    public function declineRequest($userId)
    {
        $relationshipA = Relationship::where('user_one_id',Auth::user()->id)
        ->where('user_two_id',$userId);
        $relationship =  Relationship::where('user_one_id',$userId)
        ->where('user_two_id',Auth::user()->id)
        ->union($relationshipA)
        ->update(['status'=>2,
                'action_user_id'=>Auth::user()->id]);
        return Redirect()->back()->with('success','Request declined');
    }

    public function blockUser($userId)
    {

        
    }
}
