<?php
session_start();
require_once 'config/utils.php';
$id = $_SESSION[AUTH]['id'];

$getUser = "select * from users where id = '$id'";
$user = queryExecute($getUser, false);
//if (!$user) {header('location: '.BASE_URL.'index.php');}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->


<!-- Mirrored from frenify.com/envato/frenify/html/directify/1/dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 03:36:11 GMT -->
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="description" content="Directify">
    <meta name="author" content="Frenify">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Directify | Dashboard - Profile</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Work+Sans:300,400,500,600,700,800,900"
          rel="stylesheet">

    <!-- STYLES -->
    <?php include_once '_share/style.php' ?>

</head>

<body>

<!-- WRAPPER ALL -->
<div class="directify_fn_wrapper_all">

    <!-- MOBILE MENU -->
    <?php include_once '_share/mobilemenu-white.php' ?>
    <!-- /MOBILE MENU -->

    <!-- HEADER -->
    <?php include_once '_share/header-white.php' ?>
    <!-- /HEADER -->

    <!-- CONTENT -->
    <div class="directify_fn_content">

        <!-- DASHBOARD -->
        <div class="directify_fn_dashboard_wrapper">

            <!-- DASHBOARD BACKGROUND -->
            <div class="dashboard_bg">
                <div class="overlay_color"></div>
                <div class="overlay_image jarallax" data-speed="0.2"></div>
            </div>
            <!-- /DASHBOARD BACKGROUND -->

            <!-- DASHBOARD CONTENT -->
            <div class="container">
                <div class="dashboard_content">

                    <!-- DASHBOARD MENU -->
                    <div class="menu_wrap sticky_sidebar">
                        <div class="menu">
                            <div class="header">
                                <div class="prof_who">
                                    <div class="img_holder">
                                        <img src="<?= BASE_URL . $user['image'] ?>" alt=""/>
                                    </div>
                                    <div class="title_holder">
                                        <div>
                                            <span>Xin chào!</span>
                                            \
                                            <h3><?= $user['name'] ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /DASHBOARD MENU -->


                    <div class="dashboard_wrap sticky_sidebar">

                        <!-- DASHBOARD HIDDEN LIST -->
                        <div class="hidden_list">
                            <div class="hidden_list_inner">
                                <div class="prof_img">
                                    <img src="<?= BASE_URL . $user['image'] ?>" alt=""/>
                                </div>
                                <div class="prof_name">
                                    <div>
                                        <h6>Xin chào!</h6>
                                        <h3><?= $user['name'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /DASHBOARD HIDDEN LIST -->

                        <div class="dashboard" data-wop="true">

                            <div class="profile__details">
                                <div class="title_holder">
                                    <h3>Thông Tin Tài Khoản</h3>
                                </div>
                                <!-- PROFILE FORM -->
                                <form action="<?= BASE_URL . 'models/save-edit-profile.php' ?>" method="post"
                                      enctype="multipart/form-data">
                                    <div class="directify_fn_profile_form">
                                        <!-- MAIN SECTION -->
                                        <input type="text" name="id" value="<?= $user['id'] ?>" hidden></input>
                                        <div class="directify_fn_profile_main_section">
                                            <div class="profile__image">
                                                <img id="preview-img" src="<?= BASE_URL . $user['image'] ?>" alt=""/>
                                                <div class="changer">
                                                    <input type="file" name="avatar" id="file-1"
                                                           class="inputfile inputfile-1"
                                                           onchange="encodeImageFileAsURL(this)"/>
                                                    <label for="file-1">
                                                        <span>Đổi avatar</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="profile__name">
                                                <label>Tên</label>
                                                <input type="text" id="profile__name" name="name"
                                                       value="<?= $user['name'] ?>"
                                                       placeholder="Jessica Karen"/>
                                            </div>
                                            <div class="profile__email">
                                                <label>Email</label>
                                                <input type="text" id="profile__email" name="email"
                                                       value="<?= $user['email'] ?>"
                                                       placeholder="example@mail.com"/>
                                            </div>
                                            <div class="profile__number">
                                                <label>Phone</label>
                                                <input type="text" id="profile__number" name="phone_number"
                                                       value="<?= $user['phone_number'] ?>"
                                                       placeholder="+989 4545 9697"/>
                                            </div>
                                            <div class="profile__save-changes">
                                                <input type="submit" value="Save Changes"/>
                                            </div>
                                        </div>
                                </form>
                                <!-- /MAIN SECTION -->
                                <!-- SECURITY SECTION -->

                                <!-- /SECURITY SECTION -->
                            </div>
                            <!-- /PROFILE FORM -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD -->
</div>
<!-- /CONTENT -->

<!-- FOOTER -->
<<?php include_once '_share/footer.php' ?>
<!-- /FOOTER -->

<a class="totop" href="#"><i class="xcon-angle-up"></i></a>

</div>
<!-- /WRAPPER ALL -->

<!-- SCRIPTS -->
<?php include_once '_share/script.php' ?>
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    };
</script>
</body>

<!-- Mirrored from frenify.com/envato/frenify/html/directify/1/dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 03:36:12 GMT -->
</html>
