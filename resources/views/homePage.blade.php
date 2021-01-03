<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
            <div class='logo-container'>
                <img src="{{asset('images/login/instagramTitle.png')}}" alt="">
            </div>
            <div class='search'>
                <input type="text" placeholder='Search'>
            </div>
            <div class=''>
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


                <a href="#">
                    <svg aria-label="Find People" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path clip-rule="evenodd" d="M24 0C10.8 0 0 10.8 0 24s10.8 24 24 24 24-10.8 24-24S37.2 0 24 0zm0 45C12.4 45 3 35.6 3 24S12.4 3 24 3s21 9.4 21 21-9.4 21-21 21zm10.2-33.2l-14.8 7c-.3.1-.6.4-.7.7l-7 14.8c-.3.6-.2 1.3.3 1.7.3.3.7.4 1.1.4.2 0 .4 0 .6-.1l14.8-7c.3-.1.6-.4.7-.7l7-14.8c.3-.6.2-1.3-.3-1.7-.4-.5-1.1-.6-1.7-.3zm-7.4 15l-5.5-5.5 10.5-5-5 10.5z" fill-rule="evenodd"></path>
                    </svg>
                </a>

                <a href="#">
                    <svg aria-label="Activity Feed" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22">
                        <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                    </svg>
                </a>

            </div>
        </div>

    </header>
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
        <!-- end stories -->
        <!-- POSTS -->
        <div class="posts-container">
            <ul class="posts">
                <li class='post box'>
                    <div class="post__header">
                        <div class="profile-info">
                            <div class='round-profile-img'>
                                <div class='profile-image-container'>
                                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">

                                </div>
                                <p class='post__username'>
                                    t.jorda97
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
                        <div class="left-arrow arrow-btn">
                            <i class="fas fa-chevron-circle-left"></i>
                        </div>
                        <div class="right-arrow arrow-btn">
                            <i  class="fas fa-chevron-circle-right"></i>
                        </div>
                        <ul class="post__slider--images">
                            <li>
                                <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/134721103_962094657653249_9015505115065004939_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_cat=1&_nc_ohc=pPus-P-JqmkAX-DPP7d&tp=1&oh=785afedcf98413fdebb2b1a463ec31ef&oe=601C10C9" alt="">
                            </li>
                            <li>
                                <img src="https://scontent-hel3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s750x750/135741997_712504992733878_274376449055805313_n.jpg?_nc_ht=scontent-hel3-1.cdninstagram.com&_nc_cat=1&_nc_ohc=T4s12Mwh6ZkAX8tNq5W&tp=1&oh=bbc0ab8e8f10c4eff30960524e9349d8&oe=601B0BE6" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="post__icons"></div>
                    <div class="post__likes"></div>
                    <div class="post__description"></div>
                    <div class="post__comments"></div>
                    <div class="post__add-comment"></div>

                </li>
            </ul>
        </div>
        <!-- end posts -->
    </main>
    <footer></footer>
</body>

</html>