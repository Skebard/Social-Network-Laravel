<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relationship;
use App\Models\User;
use App\Notifications\RequestSentNotification;
use Illuminate\Database\QueryException;
use App\Models\NotificationsModel;

use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RelationshipController extends Controller
{
    //

    public function sendFriendRequest($userId)
    {

        if(Relationship::exists($userId,Auth::user()->id) || $userId ===Auth::user()->id){
            return json_encode(['status'=>0]);
        }
        try {
            Relationship::insert([
                'user_one_id' => Auth::user()->id,
                'user_two_id' => $userId,
                'status' => 0,         //0 = pending request
                'action_user_id' => Auth::user()->id,
            ]);
        } catch (QueryException $e) {
            return json_encode(['status' => 0]);
        }
        NotificationsModel::deleteUserNotification($userId, Auth::user()->id);
        $user = Auth::user();
        $user->actionRelationship = 0; //request received
        User::find($userId)->notify(new RequestSentNotification($user));
        return json_encode(['status' => 1]);
    }

    public function acceptRequest($userId)
    {
        $relationshipA = Relationship::where('user_one_id', Auth::user()->id)
            ->where('user_two_id', $userId);
        $relationship =  Relationship::where('user_one_id', $userId)
            ->where('user_two_id', Auth::user()->id)
            ->union($relationshipA)
            ->update([
                'status' => 1,
                'action_user_id' => Auth::user()->id
            ]);
        NotificationsModel::deleteUserNotification(Auth::user()->id, $userId);
        NotificationsModel::deleteUserNotification($userId,Auth::user()->id);
        $user = Auth::user();
        $user->actionRelationship = 1; //request accepted
        User::find($userId)->notify(new RequestSentNotification($user));
        return json_encode(['status' => 1, 'modified' => $relationship,'accept'=>true]);
    }

    public function declineRequest($userId)
    {
        $relationshipA = Relationship::where('user_one_id', Auth::user()->id)
            ->where('user_two_id', $userId);
        $relationship =  Relationship::where('user_one_id', $userId)
            ->where('user_two_id', Auth::user()->id)
            ->union($relationshipA)
            ->update([
                'status' => 2,
                'action_user_id' => Auth::user()->id
            ]);
        $notifications = Auth::user()->notifications();
        foreach ($notifications as $notification) {
            if (json_decode($notification['data'])->id === $userId) {
                $notifications
                    ->where('id', $notification['id'])
                    ->delete();
            }
        }

        return Redirect()->back()->with('success', 'Request declined');
    }

    public function removeFriend($userId)
    {
        $relationshipA = Relationship::where('user_one_id', Auth::user()->id)
            ->where('user_two_id', $userId)->delete();
        $relationship =  Relationship::where('user_one_id', $userId)
            ->where('user_two_id', Auth::user()->id)->delete();
        NotificationsModel::deleteUserNotification($userId, Auth::user()->id);
        return json_encode(['status' => 1, 'userId' => $userId]);
    }

    public function blockUser($userId)
    {
        $newData = ['status' => 3, 'action_user_id' => Auth::user()->id];
        if (!Relationship::updateRelationship($userId, Auth::user()->id, $newData)) {
            Relationship::insert([
                'user_one_id' => Auth::user()->id,
                'user_two_id' => $userId,
                'status' => 3,
                'action_user_id' => Auth::user()->id
            ]);
        }
        return json_encode(['status' => 1]);
    }
}
