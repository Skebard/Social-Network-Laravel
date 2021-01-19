@extends('layouts.master_home')

@section('links')
<link rel="stylesheet" href="{{asset('css/notifications.css')}}">

@endsection

@section('modals')

@include('components.modalCreatePost')

@section('content')
@if(Auth::user()->notifications->count() >0 )
<div class="notifications box">
@foreach(Auth::user()->notifications as $notification)

<?php
$user = (object)$notification->data['user'];
?>
<a href="{{url('/user/'.$user->username)}}" class="round-profile-img user-to-tag">
    <div class="profile-image-container">
        <img src="{{ $user->profile_photo_path?asset($user->profile_photo_path):$user->profile_photo_url }}" alt="">

    </div>
    <div class='user-info'>
    <span class="post__username">
        {{ $user->username }}
    </span>
    <span class='notification-message'>
        @if($user->actionRelationship===1)
        has accepted your friend request.
        @elseif($user->actionRelationship===0)
        has sent you a friend request.
        @endif
    </span>
    </div>
</a>
@endforeach
</div>
@endif
@endsection


@endsection