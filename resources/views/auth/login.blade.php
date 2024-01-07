<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>HRIS-ALMAS</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/images/almaz.ico" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="assets/css/common.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/pages/extra_pages.css" rel="stylesheet" />
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-45">
                        LOGIN HRIS ALMAS
                    </span>
                    @if($errors->has('email'))
                    <div class="alert alert-danger mb-5">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" id="email" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" />
                        <span class="focus-input100"></span>
                        <span class="label-input100" for="email">Email</span>
                    </div>
                    @if($errors->has('password'))
                    <span class="text-danger mt-2">
                        {{ $errors->first('password') }}
                    </span>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" id="password" type="password" name="password" required autocomplete="current-password" />
                        <span class="focus-input100"></span>
                        <span class="label-input100" for="password">Password</span>
                    </div>
                    <div class="container-login100-form-btn mt-4">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
                <div class="login100-more" style="background-image: url('assets/images/pages/bg-01.png');">
                </div>
            </div>
        </div>
    </div>
    <!-- Plugins Js -->
    <script src="assets/js/common.min.js"></script>
    <!-- Extra page Js -->
    <script src="assets/js/pages/examples/pages.js"></script>
</body>

</html>