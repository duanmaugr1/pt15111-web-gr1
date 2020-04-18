<?php
// bắt đầu sử dụng session
session_start();
require_once "./config/utils.php";

$id = isset($_GET['id']) ? $_GET['id'] : -1;

$foodQuery = "select * from foods where id = '$id'";
$foods = queryExecute($foodQuery, true);

for ($i = 0; $i < count($foods); $i++) {
    $getPlaceQuery = "select p.id,
						p.name
						from food_place fp
						join places p 
						on fp.place_id = p.id
						where fp.food_id = " . $foods[$i]['id'];
    $places = queryExecute($getPlaceQuery, true);
    $foods[$i]['places'] = $places;

    $getTypeQuery = "select t.id,
							t.name
					from food_type ft
					join types t
					on ft.type_id = t.id
					where ft.food_id = 
					" . $foods[$i]['id'];
    $types = queryExecute($getTypeQuery, true);
    $foods[$i]['types'] = $types;
}


$commentQuery = "select 
                    cm.*, u.name as user_name, u.image as user_image
                    from comments cm
                    join users u
                    on u.id = cm.user_id where food_id = $id ORDER BY cm.id DESC LIMIT 2";
$comments = queryExecute($commentQuery, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Directify">
    <meta name="author" content="Frenify">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Directify</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Work+Sans:300,400,500,600,700,800,900" rel="stylesheet">
    <!--    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">-->

    <?php include_once '_share/style.php' ?>

</head>

<body>

    <!-- WRAPPER ALL -->
    <div class="directify_fn_wrapper_all">
        <!-- MOBILE MENU -->
        <?php include_once  '_share/mobilemenu-white.php' ?>
        <!-- /MOBILE MENU -->

        <!-- HEADER -->
        <?php include_once  '_share/header-white.php' ?>
        <!-- /HEADER -->

        <!-- CONTENT -->
        <div class="directify_fn_content">

            <!-- BLOG -->
            <div class="directify_fn_blog_single_wrap">
                <div class="directify_fn_blog_single">
                    <div class="blog_single">
                        <div class="container" style="width: 75%">
                            <div class="blog_single_wrapper">
                                <?php foreach ($foods as $food) : ?>
                                    <!-- POST IMAGE -->
                                    <div class="post_img">
                                        <div>
                                            <img src="<?= BASE_URL . $food['image'] ?>" width="100%" alt="">
                                        </div>
                                    </div>
                                    <!-- /POST IMAGE -->

                                    <!-- POST CONTENT -->
                                    <div class="post_content">
                                        <div class="title_holder">
                                            <span><a href="#">Giờ mở/đóng cửa</a><span class="date"><?= $food['time_start'] ?>/<?= $food['time_end'] ?></span></span>
                                            <h3><?= $food['name'] ?></h3>
                                            <p class="post_intro ">Địa Điểm:
                                                <em><?php foreach ($food['places'] as $place) : ?>
                                                        <a href="#"><?= $place['name'] ?></a>
                                                    <?php endforeach ?>
                                                </em>
                                            </p>
                                            <p class="text"><?= $food['description'] ?></p>

                                        </div>
                                        <div class="directify_fn_tags">
                                            <label>Loại:</label>
                                            <em><?php foreach ($food['types'] as $type) : ?>
                                                    <a href="#"><?= $type['name'] ?></a>
                                                <?php endforeach ?>
                                            </em>
                                        </div>
                                    </div>
                                    <!-- /POST CONTENT -->

                                    <!-- POST COMMENT -->
                                    <div class="directify_fn_comment_wrapper">
                                        <div class="directify_fn_comment">

                                            <!-- COMMENTS -->
                                            <div class="comments">

                                                <div class="title_holder">
                                                    <h3>All Comments</h3>
                                                </div>

                                                <!-- #1 COMMENT -->
                                                <?php foreach ($comments as $comm) : ?>
                                                    <div class="comment_single">
                                                        <div class="person_info">
                                                            <div class="info">
                                                                <div class="img_holder">
                                                                    <img src="<?= BASE_URL . $comm['user_image'] ?>" alt="">
                                                                </div>
                                                                <span class="name"><?= $comm['user_name'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="person_comment">
                                                            <div class="inner">
                                                                <span>
                                                                    <span class=""><a href="#"><?= $comm['create_at'] ?></a></span>
                                                                </span>
                                                                <p>
                                                                    <?= $comm['content'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                                <!-- /#1 COMMENT -->

                                            </div>
                                            <!-- /COMMENTS -->

                                            <!-- ADDING A COMMENT -->
                                            <div class="add_comment_wrap">
                                                <div class="add_comment">
                                                    <div class="title_holder">
                                                        <h3>Bình luận</h3>
                                                    </div>
                                                    <form action="<?= BASE_URL . 'save-comment.php' ?>" method="post">
                                                        <div class="your-comment">
                                                            <input hidden name="food_id" value="<?= $id ?>"></input>
                                                            <label>Bình luận của bạn<span>*</span></label>
                                                            <textarea id="creator-comment" name="content" cols="3" rows="10"></textarea>
                                                        </div>
                                                        <div class="your-button">
                                                            <input type="submit" id="creator-submit" value="Submit Your Comment" />
                                                        </div>
                                                        <?php if (isset($_GET['msg'])) : ?>
                                                            <span class="text-danger"><?php echo $_GET['msg']; ?></span>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /ADDING A COMMENT -->

                                        </div>
                                    </div>
                                    <!-- /POST COMMENT -->

                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /BLOG -->
        </div>
        <!-- /CONTENT -->

        <!-- FOOTER -->
        <?php include_once '_share/footer.php' ?>
        <!-- /FOOTER -->
        <a class="totop" href="#"><i class="xcon-angle-up"></i></a>
    </div>
    <!-- /WRAPPER ALL -->
    <!-- SCRIPTS -->
    <?php include_once '_share/script.php' ?>
</body>
</html>