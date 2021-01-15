@extends('layouts.master_home')
@section("links")
<link rel="stylesheet" href="{{asset('css/profileSettings.css')}}">
<link rel="stylesheet" href="{{asset('css/profileHome.css')}}">

@endsection

@section("content")


<!-- NAVIGATION BAR -->
<nav class='profile-navigation'>
    <div class="top-line"></div>
    <ul>
        <li class="<?= Request::is('accounts/edit') ? 'active' : '' ?>">

            <a href="{{url('/accounts/edit')}}">
                <span>
                    <i class="fas fa-user"></i>
                </span>
                <span class='category'>Profile</span>
            </a>
        </li>
        <li class="<?= Request::is('accounts/password') ? 'active' : '' ?>">
            <a href="{{url('/accounts/password')}}">
                <span>
                    <i class="fas fa-shield-alt"></i>
                </span>
                </span><span class='category'>Password</span></a>
            </a>
        </li>

    </ul>
</nav>




@if(Request::is('accounts/edit'))



<!-- PROFILE IMAGE FORM -->
<form class='box edit-profile-form' action="">
    @csrf
    <label class='profile-image-change'>
        <span>
            <li class="round-profile-img">
                <input class='clickable image-profile-input' type="file" style="">
                <div class="profile-image-container">
                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500" alt="">

                </div>
            </li>
        </span>
        <span class='profile-image-right'>
            <span class='username'>{{Auth::user()->username}}</span>
            <span class='change-image-btn-container'>
                <a class='profile-image-change-btn'>Change profile photo</a>
                <input class='clickable image-profile-input' type="file" style="">
            </span>
        </span>
        <!-- <input id='name-id' type="text" placeholder='Name' value='{{Auth::user()->name}}'> -->
    </label>
</form>

<!-- end profile image form -->

<!-- ACCOUNT PRIVACY -->
<form class='account-privacy-form box ' action="">
    @csrf
    <h3> Account Privacy</h3>
    <span class='checkbox-container'>
    <input type="checkbox">
        <span>Private account</span>
    </span>
    
    <p>
    When your account is private, only your friends can see your posts and stories.
</p>
</form>

<!-- end account privacy -->

<!-- MAIN PROFILE DATA -->
<form class='box edit-profile-form' action="#" method='POST'>
    @csrf

    <label for="name-id">
        <span>
            Name
        </span>
        <input id='name-id' type="text" placeholder='Name' value='{{Auth::user()->name}}'>
    </label>

    <label for="username-id">
        <span>
            Username
        </span>
        <input id='username-id' type="text" placeholder='Username' value='{{Auth::user()->username}}'>
    </label>

    <label for="bio-id">
        <span>
            Bio
        </span>
        <input id='bio-id' type="text" placeholder='Bio' value=''>
    </label>

    <label for="email-id">
        <span>
            Email
        </span>
        <input id='email-id' type="text" placeholder='Email' value='{{Auth::user()->email}}'>
    </label>

</form>
<!--  end main profile data  -->
@elseif( Request::is('accounts/password'))
<form class='box edit-profile-form' action="#" method='POST'>
    @csrf

    <label for="old-password-id">
        <span>
            Old Password
        </span>
        <input id='old-password-id' type="password" placeholder='Old Password'>
    </label>

    <label for="new-password-id">
        <span>
            New Password
        </span>
        <input id='new-password-id' type="password" placeholder='New Password'>
    </label>

    <label for="confirm-password-id">
        <span class='confirm-password'>
            <span>Confirm New</span>
            <span> &nbsp; Password</span>
        </span>
        <input id='confirm-password-id' type="password" placeholder='Confirm New Password' value=''>
    </label>

</form>
@endif
@endsection


@section('modals')
@include('components.modalCreatePost')
@endsection