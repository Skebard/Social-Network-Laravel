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
    <footer class="">
        <ul class=''>
            <li>About</li>
            <li>Blog</li>
            <li>Jobs</li>
            <li>Help</li>
            <li>API</li>
            <li>Privacy</li>
            <li>Terms</li>
            <li>Top Accounts</li>
            <li>Hashtags</li>
            <li>Locations</li>
        </ul>
        <ul>
            <li>Beauty</li>
            <li>Dance & Performance</li>
            <li>Fitness</li>
            <li>Food & Drink</li>
            <li>Home & Garden</li>
            <li>Music</li>
            <li>Visual Arts</li>
        </ul>
        <ul class='lang-copyright'>
            <li class='select-lang-container'>
                <div class="visible-select-lang">
                    English<i class="fas fa-chevron-down select-lang__arrow"></i>
                </div>
                <select class='select-lang' aria-label="Switch Display Language" class="hztqj">
                    <option value="af">Afrikaans</option>
                    <option value="cs">Čeština</option>
                    <option value="da">Dansk</option>
                    <option value="de">Deutsch</option>
                    <option value="el">Ελληνικά</option>
                    <option value="en">English</option>
                    <option value="en-gb">English (UK)</option>
                    <option value="es">Español (España)</option>
                    <option value="es-la">Español</option>
                    <option value="fi">Suomi</option>
                    <option value="fr">Français</option>
                    <option value="id">Bahasa Indonesia</option>
                    <option value="it">Italiano</option>
                    <option value="ja">日本語</option>
                    <option value="ko">한국어</option>
                    <option value="ms">Bahasa Melayu</option>
                    <option value="nb">Norsk</option>
                    <option value="nl">Nederlands</option>
                    <option value="pl">Polski</option>
                    <option value="pt-br">Português (Brasil)</option>
                    <option value="pt">Português (Portugal)</option>
                    <option value="ru">Русский</option>
                    <option value="sv">Svenska</option>
                    <option value="th">ภาษาไทย</option>
                    <option value="tl">Filipino</option>
                    <option value="tr">Türkçe</option>
                    <option value="zh-cn">中文(简体)</option>
                    <option value="zh-tw">中文(台灣)</option>
                    <option value="bn">বাংলা</option>
                    <option value="gu">ગુજરાતી</option>
                    <option value="hi">हिन्दी</option>
                    <option value="hr">Hrvatski</option>
                    <option value="hu">Magyar</option>
                    <option value="kn">ಕನ್ನಡ</option>
                    <option value="ml">മലയാളം</option>
                    <option value="mr">मराठी</option>
                    <option value="ne">नेपाली</option>
                    <option value="pa">ਪੰਜਾਬੀ</option>
                    <option value="si">සිංහල</option>
                    <option value="sk">Slovenčina</option>
                    <option value="ta">தமிழ்</option>
                    <option value="te">తెలుగు</option>
                    <option value="vi">Tiếng Việt</option>
                    <option value="zh-hk">中文(香港)</option>
                    <option value="bg">Български</option>
                    <option value="fr-ca">Français (Canada)</option>
                    <option value="ro">Română</option>
                    <option value="sr">Српски</option>
                    <option value="uk">Українська</option>
                </select></li>
            <li>@2021 Instagram from Facebook</li>
        </ul>
    </footer>
</body>

</html>