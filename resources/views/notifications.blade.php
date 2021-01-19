@extends('layouts.master_home')

@section('links')
<link rel="stylesheet" href="{{asset('css/notifications.css')}}">
<script src="{{ asset('/js/notifications.js')}}" defer></script>

@endsection


@section('content')
@if(Auth::user()->notifications->count() >0 )
<div class="notifications box">
    @foreach(Auth::user()->notifications as $notification)

    <?php
    $user = (object)$notification->data['user'];
    ?>
    <div  class="round-profile-img user-to-tag">
        <a href="{{url('/user/'.$user->username)}}" class="profile-image-container">
            <img src="{{ $user->profile_photo_path?asset($user->profile_photo_path):$user->profile_photo_url }}" alt="">
        </a>
        <div class='user-info'>
            <span  class="post__username">
                {{ $user->username }}
            </span>
            @if($user->actionRelationship===1)
            <span class='notification-message'>
                has accepted your friend request.
            </span>
            <a class="remove-friend-btn edit-btn" href="http://localhost:8000/user/friend/remove/10">Remove Friend</a>

            @elseif($user->actionRelationship===0)
            <span class='  notification-message'>
                has sent you a friend request.
            </span>
            <a class="add-friend-btn edit-btn" href="{{ url('/user/friend/accept/'.$user->id) }}">Accept Friend</a>

            @endif

        </div>
</div>
    @endforeach
</div>
@endif
@endsection

@section('modals')

@include('components.modalCreatePost')

@endsection