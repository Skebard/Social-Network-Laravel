<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9547750bbd.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script defer src="{{asset('js/home.js')}}"></script>
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
                <input type="text" placeholder='Search'>
            </div>
            <div class='user-actions'>
                <a href="#">
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

    </header>
    @if(session('success'))
            <div>{{session('success')}}</div>
                    @endif
    <main class="">

        <!-- STORIES -->
        <div class="stories box">
            <div class="left-arrow arrow-btn">
                <i id='stories-left-arrow-id' class="fas fa-chevron-circle-left"></i>
            </div>
            <ul id='stories-content-id' class='stories__content'>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-19/s150x150/119177509_174620490892838_8759153602158730850_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_ohc=saHyzKG0so4AX9rdQg9&tp=1&oh=6bc455a2f8bf1e6ab8598d54afda8e19&oe=601B4CB7" alt="">

                    </div>
                    <p class='stories__username'>
                        miaaaa
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        t.jorda97
                    </p>
                </li>
                <li class='round-profile-img'>
                    <div class='profile-image-container'>
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                    </div>
                    <p class='stories__username'>
                        last.one
                    </p>
                </li>
            </ul>
            <div class="right-arrow arrow-btn">
                <i id='stories-right-arrow-id' class="fas fa-chevron-circle-right"></i>
            </div>
        </div>

<div class="posts-container">
    <ul class="posts">
        @foreach($posts as $post)






        <li class='post box'>
            <div class="post__header">
                <div class="profile-info">
                    <div class='round-profile-img'>
                        <div class='profile-image-container'>
                            <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                        </div>
                        <p class='post__username'>
                            {{ $post->username }}
                        </p>
                    </div>
                </div>
                <div class="post-options">
                    <svg aria-label="More options" class="_8-yf5 " fill="#262626" height="16" viewBox="0 0 48 48" width="16">
                        <circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle>
                        <circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle>
                        <circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle>
                    </svg>

                </div>
            </div>
            <div class="post__slider">
                <div class=" hide left-arrow arrow-btn post__slider--arrow">
                    <i class="fas fa-chevron-circle-left"></i>
                </div>
                <div class="right-arrow arrow-btn post__slider--arrow">
                    <i class="fas fa-chevron-circle-right"></i>
                </div>
                <ul class="post__slider--images">

                    @foreach($post->images as $image)
                    <li>
                        {{ $image->image }}
                        <img src="{{asset($image->image)}}" alt="">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="post__actions">
                <div class="left-actions">
                    <a href="#">
                        <svg aria-label="Activity Feed" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                            <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                        </svg>
                    </a>
                    <a href="#">
                        <svg aria-label="Comment" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                            <path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#">
                        <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                            <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path>
                        </svg>
                    </a>
                </div>
                <div class="images-indicator">
                    <ul>
                        @php
                        $i=0;
                        @endphp
                        @foreach($post->images as $image)
                        @if($i==0)
                        <li class='active'>
                        @else
                        <li>
                        @endif
                        @php
                        $i++;
                        @endphp
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="right-actions">
                    <a href="#">
                        <svg aria-label="Save" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                            <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="post__likes">
                <span> 242</span> likes
            </div>
            <div class="post__description">
                <span class='post__username'>{{ $post->username}}</span>
                {{ $post->content }}
            </div>
            <div class="post__comments">
                <span class="post__comments--show-all">View all <span>437</span> comments</span>
                <ul class="post__comments--list">
                    <li></li>
                </ul>
            </div>
            <div class="post__publishing-date">
                {{ Carbon\Carbon::parse($post->published_at)->diffforHumans() }}
            </div>
            <div class="post__add-comment">
                <form action="{{ url('/'.$post->id.'/postComments')}}" method='POST'>
                @csrf
                    <input type='hidden' name='post_id' value=' {{$post->id}}'>
                    <input name='comment' type="text" placeholder="Add a comment...">
                    <input type="submit" value="Post">
                </form>
            </div>

        </li>
        @endforeach

    </ul>
</div>
    </main>
</body>



<!-- CREATE POST -->
<div class="modal create-post">
    <div class="modal-content">
        <button class="close-modal">
                Close modal
        </button>

        <form id='new-post-form-id' class='new-post-form multi-images-form' action="/1/posts" method='POST' enctype="multipart/form-data">
            @csrf
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            <div class="images-container" id='images-container-id'>
                <div class="input-container">
                    <div class=" last multi-images-form__btn delete-image-btn multi-images-form__btn"><i class="fas fa-trash-alt"></i></div>
                    <button class=" active add-image-btn multi-images-form__btn"><i class="fas fa-plus"></i></button>
                    <div class=" edit-image-btn  multi-images-form__btn"><i class="far fa-edit"></i></div>
                    <img class='image-display' src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
                    <input id='input-1-id' type="file" name='image[]' class="multi-images-form__image-input">
                </div>

            </div>
            <!-- <input type='file' name='image[]' data-pos='1'> -->

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type='submit'>Create</button>
            <button>Cancel</button>
        </form>
    </div>
</div>