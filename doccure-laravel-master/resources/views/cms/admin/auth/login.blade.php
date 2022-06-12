<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - تسجيل دخول</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('doccure/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/plugins/bootstrap-rtl/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/style.css')}}">

    <!--[if lt IE 9]>
			<script src="{{asset('doccure/admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('doccure/admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{asset('doccure/admin/assets/img/logo-white.png')}}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>تسجيل الدخول</h1>
                            <p class="account-subtitle">الدخول الى لوحة التحكم</p>

                            <!-- Form -->
                            <form>
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" id="email" type="text" placeholder="البريد الإلكتروني">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="password" type="password" placeholder="كلمة المرور">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onclick="login()">تسجيل
                                        الدخول</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="text-center forgotpass"><a href="forgot-password.html">نسيت كلمة المرور؟</a>
                            </div>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">أو</span>
                            </div>

                            <!-- Social Login -->
                            <div class="social-login">
                                <span>تسجيل دخول بإستخدام</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#"
                                    class="google"><i class="fa fa-google"></i></a>
                            </div>
                            <!-- /Social Login -->
                            <div class="text-center dont-have">ليس لديك حساب؟ <a href="register.html">سجّل الآن</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('doccure/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('doccure/admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('doccure/admin/assets/js/bootstrap.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('doccure/admin/assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function login(){
            let guard = '{{ request()->guard }}';
            axios.post('/cms/'+guard+'/login', {
                guard: guard,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
            })
            .then(function (response) {
                window.location.href = '/cms/'+guard;
            })
            .catch(function (error) {
                console.log(error.response.data);
                // showToast(error.response.data.message, false);
            });
        }
    </script>
</body>

</html>