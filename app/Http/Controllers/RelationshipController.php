<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relationship;
use App\Models\User;
use Illuminate\Database\QueryException;

use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
            return json_encode(['status'=>0]);
            //return  Redirect()->back()->with('error', 'Request could not be sent');
        }
        //return Redirect()->back()->with('success','Request has been sent');
        return json_encode(['status'=>1]);
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
        return json_encode(['status'=>1,'modified'=>$relationship]);

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

    public function removeFriend($userId)
    {
        $relationshipA = Relationship::where('user_one_id',Auth::user()->id)
        ->where('user_two_id',$userId)->delete();
        $relationship =  Relationship::where('user_one_id',$userId)
        ->where('user_two_id',Auth::user()->id)->delete();
        return json_encode(['status'=>1]);
    }

    public function blockUser($userId)
    {
        $newData = ['status'=>3,'action_user_id'=>Auth::user()->id];
        if(!Relationship::updateRelationship($userId,Auth::user()->id,$newData)){
            Relationship::insert(['user_one_id'=>Auth::user()->id,
                                    'user_two_id'=>$userId,
                                    'status'=>3,
                                    'action_user_id'=>Auth::user()->id]);
        }
        return json_encode(['status'=>1]);

    }
}
