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

        <div class="form-container">

            <div class=" register login box">
                <img class='app-name' src="{{ asset('images/login/instagramTitle.png')}}" alt="">
                <h3 class='register-text'>Sign up to see photos and <br> videos from your friends.</h3>
                <button class='action-btn'><i class="fab fa-facebook-square"></i> Log in with Facebook</button>
                <div class="separator">
                    <div class="left line">

                    </div>
                    <div class="content">
                        OR
                    </div>
                    <div class="right line">

                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}" class="login-form ">
                    @csrf
                    <label class='input-container'>
                        <span class="upper-placeholder">Email</span>
                        <input type="text" name='email'>
                        <div class="input-container__end"></div>
                    </label>
                    <label class='input-container'>
                        <span class="upper-placeholder">Full Name</span>
                        <input type="text" name='name' >
                        <div class="input-container__end"></div>
                    </label>
                    <label class='input-container'>
                        <span class="upper-placeholder">Username</span>
                        <input type="text" name='username' >
                        <div class="input-container__end"></div>
                    </label>
                    <label class='input-container'>
                        <span class="upper-placeholder">Password</span>
                        <input type="password" name="password" id='input-password-id'>
                        <div  id='show-password-btn' class="input-container__end input-container__show">Show</div>
                    </label>
                    <label class='input-container'>
                        <span class="upper-placeholder">Confirm Password</span>
                        <input type="password" name="password_confirmation" id='input-password-id'>
                        <div  id='show-password-btn' class="input-container__end input-container__show">Show</div>
                    </label>
                    <input class='submit-btn' type="submit" value='Sign Up'>
                </form>


                @if (count($errors) > 0)
                <p class='error-message'>
                {{ $errors->all()[0] }}
                </p>
                        
                @endif

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