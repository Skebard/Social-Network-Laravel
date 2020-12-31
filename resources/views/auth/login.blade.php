<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}" class="">
</head>

<body>
    <main class="main-content">
        <div class="slider-container">
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
                        <span class="upper-placeholder">Phone number, username, or email</span>
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
                <div class="login-facebook">
                </div>
            </div>


            <div class="sign-up box">Don't have an account? Sign up</div>
            <div class="apps">
                <img src="{{ asset('images/login/appStore.png')}}" alt="">
                <img src="{{ asset('images/login/googlePlay.png')}}" alt="">
            </div>


        </div>
    </main>
    <footer class="">
    </footer>
</body>

</html>