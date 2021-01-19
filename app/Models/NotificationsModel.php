<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
    use HasFactory;

    public static function deleteUserNotification($notifiable_id,$userId)
    {
        $user = User::find($notifiable_id);
        $notifications = $user->notifications;
        foreach($notifications as $notification){
            if(($notification['data']['user']['id'] == $userId) && ($notification['notifiable_id']==$notifiable_id)){
                $user->notifications()
                ->where('id',$notification['id'])
                ->delete();
            }
        }
    }
}
