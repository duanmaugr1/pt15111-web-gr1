<?php 
// bắt đầu sử dụng session
session_start();
require_once "./config/utils.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= LOGINTHEME_ASSET_URL ?>images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= LOGINTHEME_ASSET_URL ?>css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= LOGINTHEME_ASSET_URL ?>images/avatar-01.png');">
        <div class="wrap-login100 p-t-100 p-b-30">
            <form class="login100-form validate-form" action="post-login.php" method="post">
                <div class="d-flex justify-content-center">
                    <?php if(isset($_GET['msg'])):?>
                        <span class="text-danger"><?php echo $_GET['msg']?></span>
                    <?php endif;?>
                </div>
                <div class="login100-form-avatar">
                    <img src="<?= LOGINTHEME_ASSET_URL ?>images/avatar-01.jpg" alt="AVATAR">
                </div>
                <span class="login100-form-title  p-b-45">
						Thỏa thích khám phá
					</span>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
                    <input class="input100" type="email" name="email" placeholder="Hãy điền e mail">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center w-full" style="margin-top: 10px">
                    <a class="txt1" href="<?= BASE_URL . 'register.php' ?>">
                        Create new account
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="<?= LOGINTHEME_ASSET_URL ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= LOGINTHEME_ASSET_URL ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?= LOGINTHEME_ASSET_URL ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?= LOGINTHEME_ASSET_URL ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?= LOGINTHEME_ASSET_URL ?>js/main.js"></script>

</body>
</html>