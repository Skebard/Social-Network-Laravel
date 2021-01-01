<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>

    <!-- Scripts -->
    <script defer src="{{asset('js/login.js')}}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}" class="">
</head>

<body>
    <main class="main-content">
        <div class="slider-container">
            <div class="slider-container__images" id='slider-container-id'>
                <img class='active' src="{{asset('images/login/slider1.jpg')}}" alt="">
                <img src="{{asset('images/login/slider2.jpg')}}" alt="">
                <img src="{{asset('images/login/slider3.jpg')}}" alt="">
                <img src="{{asset('images/login/slider4.jpg')}}" alt="">
                <img src="{{asset('images/login/slider5.jpg')}}" alt="">
            </div>
            <img src="{{ asset('images/login/phones.png') }}" alt="phones background">
        </div>
        <div class="form-container">

            <div class="login box">
                <img class='app-name' src="{{ asset('images/login/instagramTitle.png')}}" alt="">
                <form action="" class="login-form ">
                    <label class='input-container'>
                        <span class="upper-placeholder">Phone number, username, or email</span>
                        <input type="text">
                    </label>
                    <label class='input-container'>
                        <span class="upper-placeholder">Password</span>
                        <input type="password">
                    </label>
                    <input class='submit-btn' type="submit" value='Log In'>
                </form>
                <div class="separator">
                    <div class="left line">

                    </div>
                    <div class="content">
                        OR
                    </div>
                    <div class="right line">

                    </div>
                </div>
                <a class="login-facebook" href="#">
                    <img class='facebook-logo' src="{{asset('images/login/facebookLogo.png')}}" alt="Facebook Logo">
                    <span class="login-facebook__text">Log in with Facebook</span>
                </a>
                <a class='forgot-password' href="#">
                    Forgot password?
                </a>
            </div>


            <div class="sign-up box">Don't have an account? <a class='sign-up__btn' href="#">Sign up</a> </div>
            <div class="apps">
                    <p class='apps__text'>Get the app</p>
                <img src="{{ asset('images/login/appStore.png')}}" alt="">
                <img src="{{ asset('images/login/googlePlay.png')}}" alt="">
            </div>


        </div>
    </main>
    <footer class="">
    </footer>
</body>

</html>