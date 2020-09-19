<?php

if ((isset($_SESSION['oturum']) && $_SESSION['oturum'] == 1) || (isset($_COOKIE['oturum']) && $_COOKIE['oturum'] == 1))
{
    header("location: index");
    exit();
}

// Check Current Page And User's Sessions
if (basename($_SERVER['PHP_SELF']) == 'login.php') {
    if (isset($_SESSION['oturum']) && !empty($_SESSION['oturum'])) {
        header("location: index");
    }
}

if (isset($_POST) && !empty($_POST))
{

    // Validating The Posts Content
    if (empty($_POST['email'])) { $errors[] = "Lütfen kullanıcı adınızı veya e-posta adresinizi giriniz"; }
    if (empty($_POST['password'])) { $errors[] = "Lütfen şifrenizi giriniz"; }

    // Validating The CSRF Token
    if (isset($_POST['csrf_token'])) {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token'])
        {
        }
        else
        {
            $errors[] = "CSRF Token Doğrulaması ile ilgili sorun oluştu";
        }
    }

    // CSRF Token Time Validation
    $max_time = 60*60*24; // in seconds
    if(isset($_SESSION['csrf_token_time']))
    {
        $token_time = $_SESSION['csrf_token_time'];
        if(($token_time + $max_time) >= time() )
        {

        }
        else
        {
            $errors[] = "CSRF Token Geçersiz";
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
        }
    }

    if (empty($errors))
    {
        $db = \Core\Model::getDB();
        // Check The Login Details
        $query = "SELECT * FROM admins WHERE email=?";
        $result = $db->prepare($query);
        $result->execute(array($_POST['email']));
        $count = $result->rowCount($result);
        $res = $result->fetch(PDO::FETCH_ASSOC);
        if ($count == 1)
        {
            if (password_verify($_POST['password'], $res['password']))
            {
                session_regenerate_id();
                $_SESSION['admins'] = $res['id'];
                if (isset($_POST['remember']) && $_POST['remember'] == "on")
                {
                    setcookie('admins', $res['id'], time() + (60*60*24*7));
                }
                \Core\Helpers::redirect('admin/login', 1);
            }
            else
            {
                $errors[] = "Kullanıcı Adı / E-Posta veya Şifre Hatalı!" ;
            }
        }
        else
        {
            $errors[] = "Kullanıcı Adı / E-Posta veya Şifre Hatalı!";
        }
    }

}
$token = md5(uniqid(rand(), TRUE));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Login V11</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?=\Core\Helpers::url('admin/assets/login/images/icons/favicon.ico')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/vendor/animate/animate.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/vendor/css-hamburgers/hamburgers.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/vendor/select2/select2.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/css/util.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=\Core\Helpers::url('admin/assets/login/css/main.css')?>">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form action="<?=\Core\Helpers::url('admin/login')?>" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						<?=\Core\Language::lang('login-page-form-title')?>
					</span>


                <?php
                if (!empty($errors))
                {
                    echo '<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir e-posta adresi giriniz">';
                    foreach($errors as $error)
                    {
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>' . ' <br>';
                    }
                    echo '</div>';
                }
                ?>

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
                        Copyright &copy; <?=date('Y')?>
                    </span>
                </div>


            </form>
        </div>
    </div>
</div>

<script src="<?=\Core\Helpers::url('admin/assets/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<script src="<?=\Core\Helpers::url('admin/assets/login/vendor/bootstrap/js/popper.js')?>"></script>
<script src="<?=\Core\Helpers::url('admin/assets/login/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=\Core\Helpers::url('admin/assets/login/vendor/select2/select2.min.js')?>"></script>
<script src="<?=\Core\Helpers::url('admin/assets/login/js/main.js')?>"></script>

</body>
</html>