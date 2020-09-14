<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V11</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ url }}admin/assets/login/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ url }}admin/assets/login/css/main.css">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form action="{{ url }}admin/auth" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						GİRİŞ YAPIN
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir e-posta adresi giriniz">
                    <input class="input100" type="text" name="email" placeholder="E-posta">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen şifrenizi giriniz">
                    <input class="input100" type="password" name="password" placeholder="Şifre">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                </div>

                <div class="contact100-form-checkbox m-l-4">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Beni Hatırla
                    </label>
                </div>

                <div class="container-login100-form-btn p-t-25">
                    <button class="login100-form-btn">
                        Oturum Aç
                    </button>
                </div>

                <div class="text-center w-full p-t-42 p-b-22">
                    <span class="txt1">
                        Copyright &copy; {{ "now"|date("Y") }}
                    </span>
                </div>


            </form>
        </div>
    </div>
</div>

<script src="{{ url }}admin/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="{{ url }}admin/assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="{{ url }}admin/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url }}admin/assets/login/vendor/select2/select2.min.js"></script>
<script src="{{ url }}admin/assets/login/js/main.js"></script>

</body>
</html>