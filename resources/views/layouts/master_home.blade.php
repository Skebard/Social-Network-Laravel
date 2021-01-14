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
            <div class='logo-container'>
                <img src="{{asset('images/login/instagramTitle.png')}}" alt="">
            </div>
            <!-- SEARCH -->
            <div class='search'>
                <div class="search__input-container">
                    <input autocomplete="off" id='search-input-id' class='search__input' type="text" placeholder='Search'>
                    <span class='small-search-icon'>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-fw">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class="">

                    </path></svg>
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
            <div class='user-actions'>
                <a href="{{url('/')}}">
                    <svg aria-label="Home" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path d="M45.5 48H30.1c-.8 0-1.5-.7-1.5-1.5V34.2c0-2.6-2.1-4.6-4.6-4.6s-4.6 2.1-4.6 4.6v12.3c0 .8-.7 1.5-1.5 1.5H2.5c-.8 0-1.5-.7-1.5-1.5V23c0-.4.2-.8.4-1.1L22.9.4c.6-.6 1.6-.6 2.1 0l21.5 21.5c.3.3.4.7.4 1.1v23.5c.1.8-.6 1.5-1.4 1.5z"></path>
                    </svg>
                </a>

                <a href="#">
                    <svg aria-label="Direct" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path>
                    </svg>
                </a>


                <!-- <a href="#">
                    <svg aria-label="Find People" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path clip-rule="evenodd" d="M24 0C10.8 0 0 10.8 0 24s10.8 24 24 24 24-10.8 24-24S37.2 0 24 0zm0 45C12.4 45 3 35.6 3 24S12.4 3 24 3s21 9.4 21 21-9.4 21-21 21zm10.2-33.2l-14.8 7c-.3.1-.6.4-.7.7l-7 14.8c-.3.6-.2 1.3.3 1.7.3.3.7.4 1.1.4.2 0 .4 0 .6-.1l14.8-7c.3-.1.6-.4.7-.7l7-14.8c.3-.6.2-1.3-.3-1.7-.4-.5-1.1-.6-1.7-.3zm-7.4 15l-5.5-5.5 10.5-5-5 10.5z" fill-rule="evenodd"></path>
                    </svg>
                </a> -->
                <a id='new-post-btn-id'>
                    <i class="far fa-plus-square"></i>
                </a>

                <a href="#">
                    <svg aria-label="Activity Feed" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                    </svg>
                </a>
                <a href="#">
                    <i class="far fa-bell"></i>
                </a>
                <a href="#">
                    <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s750x750/135741997_712504992733878_274376449055805313_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_cat=1&_nc_ohc=T4s12Mwh6ZkAX8tNq5W&tp=1&oh=bbc0ab8e8f10c4eff30960524e9349d8&oe=601B0BE6" alt="Profile user image">
                </a>

            </div>
        </div>
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