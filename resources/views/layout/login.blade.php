<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>THACH CLOUD | ĐĂNG NHẬP</title>
    <link rel="icon" href="{{ asset('images/icons/logo.png') }}" type="image/gif">
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('images/signin-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{ route('user.register') }}" class="signup-image-link">Create an account</a><br>
                        <a href="{{ route('forgotpass') }}" class="signup-image-link">Forgot Password</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        @if(Session::has('login_fail'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('login_fail') }}
                            </div>
                        @endif
                        @if(Session::has('captcha_fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('captcha_fail') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="error">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" class="register-form" id="loginForm" action="{{route('user.post_login')}}">
                          @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember-me" class="agree-term" /> 
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group captcha">
                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                                <div class="g-recaptcha" data-sitekey="6LeyCaQpAAAAAHAUNtmzjy7YN4ASUvop3VfUDigK"></div>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jsform.js') }}"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("loginForm").submit();
        }
    </script>
</body>
</html>
