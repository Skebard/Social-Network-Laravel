@extends('layouts.master_home')

@section('links')
<link rel="stylesheet" href="{{asset('css/profileHome.css')}}">
<link rel="stylesheet" href="{{asset('css/friends.css')}}">
<script src="{{asset('js/friends.js')}}" defer></script>

@endsection



@section('content')
<!-- PROFILE INPUTS WITH DATA -->
<input id='profile-userId-id' type="hidden" value='{{$user->id}}'>
<div class="profile-info">
    <div class="profile-info__left">
        <a href="#">
            <img class='profile-info__image' src="{{ $user->profile_photo_path?$user->profile_photo_path:$user->profile_photo_url}}" alt="">
        </a>
    </div>

    <div class="profile-info__right-up">
        <div class="user-options">
            <h2 class='username'>{{ $user->username }}</h2>
        @if($user->id === Auth::user()->id)
            <a href='#' class='edit-btn'>Edit Profile</a>
            <svg aria-label="Options" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                <path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path>
            </svg>
            <a href='#' class='edit-btn m-width'>Edit Profile</a>
        @else
            @if(!$relationship || $relationship->status === 2)
            <a href="{{url('/user/friend/add/'.$user->id)}}" class='edit-btn'> Add Friend</a>
            @elseif($relationship->status ===0 && $relationship->action_user_id==Auth::user()->id)
            <a href="{{url('/user/friend/add/'.$user->id)}}" class='edit-btn'> Request sent</a>
            @elseif($relationship->status ===0 && $relationship->action_user_id!==Auth::user()->id)
            <a href="{{url('/user/friend/accept/'.$user->id)}}" class='edit-btn'> Accept request</a>
            <a href="{{url('/user/friend/decline/'.$user->id)}}" class='edit-btn'> Decline request</a>
            @elseif($relationship->status === 1)
            <a href="{{url('/user/friend/remove/'.$user->id)}}" class='edit-btn'>Remove Friend</a>
            @elseif($relationship->status === 3 && $relationship->action_user_id===Auth::user()->id)
            <a href="{{url('/user/friend/add/'.$user->id)}}" class='edit-btn'>Unblock</a>
            @endif
            <svg aria-label="More options" class="_8-yf5 " fill="#262626" height="16" viewBox="0 0 48 48" width="16">
                <circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle>
                <circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle>
                <circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle>
            </svg>
        @endif
        </div>

        <div class="info">
            <span><b>{{count($posts)}}</b> posts</span>
            <span id='friends-btn-id'><b>{{ count($user->friends)}}</b> friends</span>
            <span><b>123</b> followers</span>
            <span><b>321</b> following</span>
        </div>
    </div>

    <div class="profile-info__right-bottom">
        <h3 class='name'>{{$user->name .' '. $user->last_name}}</h3>
        <p class='description'>this is a great
            very great
        </p>

    </div>
</div>

<!-- NAVIGATION BAR -->
<nav class='profile-navigation'>
    <div class="top-line"></div>
    <ul>
        <li class='<?= $page==='home'? 'active':'' ?>'>

            <a href="{{url('/user/'.$user->username)}}">
                <span>
                    <svg aria-label="Posts" class="_8-yf5 " fill="#262626" height="12" viewBox="0 0 48 48" width="12">
                        <path clip-rule="evenodd" d="M45 1.5H3c-.8 0-1.5.7-1.5 1.5v42c0 .8.7 1.5 1.5 1.5h42c.8 0 1.5-.7 1.5-1.5V3c0-.8-.7-1.5-1.5-1.5zm-40.5 3h11v11h-11v-11zm0 14h11v11h-11v-11zm11 25h-11v-11h11v11zm14 0h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11zm14 28h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11z" fill-rule="evenodd"></path>
                    </svg>
                </span>
                <span class='category'>PosTS</span>
                </a>
        </li>
    @if($user->id === Auth::user()->id)
        <li class="<?= $page==='saved'? 'active':'' ?>">
            <a href="{{url($user->username.'/saved')}}"> <span><svg aria-label="Saved" class="_8-yf5 " fill="#8e8e8e" height="12" viewBox="0 0 48 48" width="12">
                        <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path>
                    </svg></span>
                </span><span class='category'>saved</span></a>
            </a>
        </li>
        <li class="<?= $page==='archived'? 'active':'' ?>">

            <a href="{{url($user->username.'/archived')}}"> <span class='archive-icon'><i class="far fa-folder-open"></i></span>
                </span>
                <span class='category'>archived</span></a>
            </a>
        </li>
    @endif

    </ul>
</nav>
<!-- end navigation bar  -->

<!-- POSTS -->
<div class="posts-container">
    <ul class="posts">
    @if($posts)
        @foreach($posts as $post)
        <li>
            <span class='multi-images-icon'><i class="fas fa-clone"></i></span>
            @if(count($post->images)>0)
            <img src="{{ asset($post->images[0]->image)}}" alt="">
            @else
            <img src="https://picsum.photos/seed/picsum/200/300" alt="">

            @endif
            <div class="hover-info">
                @if($page=='archived')
                <a style="z-index:100;color:white;"href="{{url('/posts/'.$post->id).'/restore'}}">RESTORE</a>
                @endif
                <div class="hover-info__bg">
                <a class='post-link' href="{{url('/posts/'.$post->id)}}"></a>
                </div>
                <span class='hover-info__content likes'>
                    <svg aria-label="Unlike" class="_8-yf5 " fill="#ffff" height="24" viewBox="0 0 48 48" width="24">
                        <path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                    </svg>
                    <b>{{ $post->likes }}</b>
                </span>
                <span class='hover-info__content'>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 16 16">
                        <path fill="#ffff" d="M8 1c-4.4 0-8 2.5-8 5.5 0 2 2 3.8 4 4.8 0 0 0 0 0 0 0 2.1-2 2.8-2 2.8 2.8 0 4.4-1.3 5.1-2.1 0.3 0 0.6 0 0.9 0 4.4 0 8-2.5 8-5.5s-3.6-5.5-8-5.5z" />
                    </svg>
                    <b>{{ count($post->comments)}}</b>
                </span>

            </div>
        </li>
        @endforeach
    @endif
    </ul>
</div>
<!-- end posts  -->
@endsection


@section('modals')
@include('components.modalCreatePost')
@include('components.modalFriends')
@include('layouts.modalPostOptions')
@endsection