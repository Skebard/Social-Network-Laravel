<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9547750bbd.js" crossorigin="anonymous"></script>
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
                <form method="POST" action="{{ route('login') }}" class="login-form ">
                    @csrf
                    <label class='input-container'>
                        <span class="upper-placeholder">Phone number, username, or email</span>
                        <input type="text" name='email' >
                        <div class="input-container__end"></div>
                    </label>
                    <label class='input-container'>
                        <span class="upper-placeholder">Password</span>
                        <input type="password" name="password" id='input-password-id'>
                        <div  id='show-password-btn' class="input-container__end input-container__show">Show</div>
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
                @if (count($errors) > 0)
                <p class='error-message'>
                {{ $errors->all()[0] }}
                </p>
                        
                @endif
                <a class='forgot-password' href="#">
                    Forgot password?
                </a>
            </div>


            <div class="sign-up box">Don't have an account? <a class='sign-up__btn' href="{{route('register')}}">Sign up</a> </div>
            <div class="apps">
                <p class='apps__text'>Get the app</p>
                <img src="{{ asset('images/login/appStore.png')}}" alt="">
                <img src="{{ asset('images/login/googlePlay.png')}}" alt="">
            </div>


        </div>
    </main>
    @include('layouts.footer');
</body>

</html>