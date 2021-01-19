<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- SCRIPTS -->
    <script src="{{asset('js/header.js')}}" defer></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9547750bbd.js" crossorigin="anonymous"></script>

    @yield('links')
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}" class="">

</head>

<body>

    <header class="box">
        <div class="header-content">
            <!-- LOGO -->
            <a href="{{url('/')}}" class='logo-container'>
                <img src="{{asset('images/login/instagramTitle.png')}}" alt="">
            </a>
            <!-- SEARCH -->
            <div class='search'>
                <div class="search__input-container">
                    <input autocomplete="off" id='search-input-id' class='search__input' type="text" placeholder='Search'>
                    <span class='small-search-icon'>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-fw">
                            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class="">

                            </path>
                        </svg>
                    </span>
                </div>
                <!-- SEARCH RESULTS -->
                <div id='up-arrow-id' class="up-arrow"></div>
                <div id='search-results-id' class="search-results box">
                    <!-- search result template-->
                    <!-- <a href="#">
                        <div class="profile-info">
                            <div class='round-profile-img'>
                                <div class='profile-image-container'>
                                    <img src="http://localhost:8000/images/users/defaultProfileImage.png" alt="">

                                </div>
                            </div>
                        </div>
                        <span class='search-results__user-info'>
                            <span class='search-username'>t.jorda97</span>
                            <span class='search-name'>Toni Jorda</span>
                        </span>
                    </a> -->

                </div>
                <!-- end search results-->
            </div>
            <!-- HEADER ICONS -->
            <div  id='user-actions-id' class='user-actions'>

                <span id='drop-down-btn-id' class='clickable drop-down-icon'>
                    <i class="fa fa-bars"></i>
                </span>
                <a class='first-icon' href="{{url('/')}}">
                    @if (Request::is('/'))
                    <svg aria-label="Home" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path d="M45.5 48H30.1c-.8 0-1.5-.7-1.5-1.5V34.2c0-2.6-2.1-4.6-4.6-4.6s-4.6 2.1-4.6 4.6v12.3c0 .8-.7 1.5-1.5 1.5H2.5c-.8 0-1.5-.7-1.5-1.5V23c0-.4.2-.8.4-1.1L22.9.4c.6-.6 1.6-.6 2.1 0l21.5 21.5c.3.3.4.7.4 1.1v23.5c.1.8-.6 1.5-1.4 1.5z"></path>
                    </svg>
                    <span class="icon-text">Home</span>
                    @else
                    <svg aria-label="Home" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path d="M45.3 48H30c-.8 0-1.5-.7-1.5-1.5V34.2c0-2.6-2-4.6-4.6-4.6s-4.6 2-4.6 4.6v12.3c0 .8-.7 1.5-1.5 1.5H2.5c-.8 0-1.5-.7-1.5-1.5V23c0-.4.2-.8.4-1.1L22.9.4c.6-.6 1.5-.6 2.1 0l21.5 21.5c.4.4.6 1.1.3 1.6 0 .1-.1.1-.1.2v22.8c.1.8-.6 1.5-1.4 1.5zm-13.8-3h12.3V23.4L24 3.6l-20 20V45h12.3V34.2c0-4.3 3.3-7.6 7.6-7.6s7.6 3.3 7.6 7.6V45z"></path>
                    </svg>
                    <span class="icon-text">Home</span>
                    @endif

                </a>



                <!-- <a href="#">
                    <svg aria-label="Find People" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path clip-rule="evenodd" d="M24 0C10.8 0 0 10.8 0 24s10.8 24 24 24 24-10.8 24-24S37.2 0 24 0zm0 45C12.4 45 3 35.6 3 24S12.4 3 24 3s21 9.4 21 21-9.4 21-21 21zm10.2-33.2l-14.8 7c-.3.1-.6.4-.7.7l-7 14.8c-.3.6-.2 1.3.3 1.7.3.3.7.4 1.1.4.2 0 .4 0 .6-.1l14.8-7c.3-.1.6-.4.7-.7l7-14.8c.3-.6.2-1.3-.3-1.7-.4-.5-1.1-.6-1.7-.3zm-7.4 15l-5.5-5.5 10.5-5-5 10.5z" fill-rule="evenodd"></path>
                    </svg>
                </a> -->
                <a id='new-post-btn-id'>
                    <i class="far fa-plus-square"></i>
                    <span class="icon-text">Create Post</span>

                </a>


                <a class='bell-container' href="{{url('/notifications')}}">
                    @if(Auth::user()->unreadNotifications->count()>0)
                    <span class='number-notifications'>{{ Auth::user()->unreadNotifications->count() }}</span>
                    @endif
                    <i class="far fa-bell"></i>
                    <span class="icon-text">Notifications</span>

                </a>
                <div class="profile-icon">
                    <a class='clickable'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s750x750/135741997_712504992733878_274376449055805313_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_cat=1&_nc_ohc=T4s12Mwh6ZkAX8tNq5W&tp=1&oh=bbc0ab8e8f10c4eff30960524e9349d8&oe=601B0BE6" alt="Profile user image">
                        <span class="icon-text">Profile</span>
                    </a>
                    <!-- DROPDOWN MENU -->
                    <div id='up-arrow-profile-menu-id' class=" hide up-arrow"></div>
                    <span class="hide user-pages-links">

                        <a href="{{url('/user/'.Auth::user()->username)}}">
                            <svg aria-label="Profile" class="_8-yf5 " fill="#262626" height="16" viewBox="0 0 32 32" width="16">
                                <path d="M16 0C7.2 0 0 7.1 0 16c0 4.8 2.1 9.1 5.5 12l.3.3C8.5 30.6 12.1 32 16 32s7.5-1.4 10.2-3.7l.3-.3c3.4-3 5.5-7.2 5.5-12 0-8.9-7.2-16-16-16zm0 29c-2.8 0-5.3-.9-7.5-2.4.5-.9.9-1.3 1.4-1.8.7-.5 1.5-.8 2.4-.8h7.2c.9 0 1.7.3 2.4.8.5.4.9.8 1.4 1.8-2 1.5-4.5 2.4-7.3 2.4zm9.7-4.4c-.5-.9-1.1-1.5-1.9-2.1-1.2-.9-2.7-1.4-4.2-1.4h-7.2c-1.5 0-3 .5-4.2 1.4-.8.6-1.4 1.2-1.9 2.1C4.2 22.3 3 19.3 3 16 3 8.8 8.8 3 16 3s13 5.8 13 13c0 3.3-1.2 6.3-3.3 8.6zM16 5.7c-3.9 0-7 3.1-7 7s3.1 7 7 7 7-3.1 7-7-3.1-7-7-7zm0 11c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
                            </svg>
                            Profile</a>
                        <a href="{{url(Auth::user()->username.'/saved')}}">
                            <svg aria-label="Saved" class="_8-yf5 " fill="#262626" height="16" viewBox="0 0 32 32" width="16">
                                <path d="M28.7 32c-.4 0-.8-.2-1.1-.4L16 19.9 4.4 31.6c-.4.4-1.1.6-1.6.3-.6-.2-.9-.8-.9-1.4v-29C1.8.7 2.5 0 3.3 0h25.4c.8 0 1.5.7 1.5 1.5v29c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM4.8 3v23.9l9.4-9.4c.9-.9 2.6-.9 3.5 0l9.4 9.4V3H4.8z"></path>
                            </svg>
                            Saved</a>
                        <a href="{{url('/accounts/edit')}}">
                            <svg aria-label="Settings" class="_8-yf5 " fill="#262626" height="16" viewBox="0 0 32 32" width="16">
                                <path d="M31.2 13.4l-1.4-.7c-.1 0-.2-.1-.2-.2v-.2c-.3-1.1-.7-2.1-1.3-3.1v-.1l-.2-.1v-.3l.5-1.5c.2-.5 0-1.1-.4-1.5l-1.9-1.9c-.4-.4-1-.5-1.5-.4l-1.5.5H23l-.1-.1h-.1c-1-.5-2-1-3.1-1.3h-.2c-.1 0-.1-.1-.2-.2L18.6.9c-.2-.5-.7-.9-1.2-.9h-2.7c-.5 0-1 .3-1.3.8l-.7 1.4c0 .1-.1.2-.2.2h-.2c-1.1.3-2.1.7-3.1 1.3h-.1l-.1.2h-.3l-1.5-.5c-.5-.2-1.1 0-1.5.4L3.8 5.7c-.4.4-.5 1-.4 1.5l.5 1.5v.5c-.5 1-1 2-1.3 3.1v.2c0 .1-.1.1-.2.2l-1.4.7c-.6.2-1 .7-1 1.2v2.7c0 .5.3 1 .8 1.3l1.4.7c.1 0 .2.1.2.2v.2c.3 1.1.7 2.1 1.3 3.1v.1l.2.1v.3l-.5 1.5c-.2.5 0 1.1.4 1.5l1.9 1.9c.3.3.6.4 1 .4.2 0 .3 0 .5-.1l1.5-.5H9l.1.1h.1c1 .5 2 1 3.1 1.3h.2c.1 0 .1.1.2.2l.7 1.4c.2.5.7.8 1.3.8h2.7c.5 0 1-.3 1.3-.8l.7-1.4c0-.1.1-.2.2-.2h.2c1.1-.3 2.1-.7 3.1-1.3h.1l.1-.1h.3l1.5.5c.1 0 .3.1.5.1.4 0 .7-.1 1-.4l1.9-1.9c.4-.4.5-1 .4-1.5l-.5-1.5V23l.1-.1v-.1c.5-1 1-2 1.3-3.1v-.2c0-.1.1-.1.2-.2l1.4-.7c.5-.2.8-.7.8-1.3v-2.7c0-.5-.4-1-.8-1.2zM16 27.1c-6.1 0-11.1-5-11.1-11.1S9.9 4.9 16 4.9s11.1 5 11.1 11.1-5 11.1-11.1 11.1z"></path>
                            </svg>
                            Settings</a>
                        <form action="{{route('logout')}}" method='POST'>
                            @csrf
                            <input type="submit" value='Log Out'>
                        </form>

                    </span>
                    <!-- end dropdown menu -->
                </div>


            </div>

        </div>
        <!-- end header icons-->
        <input type="hidden" id='current-username-id' value="{{Auth::check()? Auth::user()->username :''}}">
        <input type='hidden' id='current-userId-id' value="{{Auth::check()? Auth::user()->id :''}}">
    </header>
    @if(session('success'))
    <script defer>
        toastr.success("{{session('success')}}");
    </script>
    @elseif(session('error'))
    <script defer>
        toastr.error("{{session('error')}}");
    </script>
    @endif
    <main class="">

        @yield('content')
    </main>

    @include('layouts.footer')
</body>

@yield('modals')