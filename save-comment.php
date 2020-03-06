<?php
session_start();
require_once 'config/utils.php';
if(!isset($_SESSION[AUTH]) || $_SESSION[AUTH] == null || count($_SESSION[AUTH]) == 0){
    header('location: ' . BASE_URL . 'detail.php?msg=Bạn phải đăng nhập để viết bình luận.');
    die;
}
$food_id = trim($_POST['food_id']);
$content = trim($_POST['content']);
$user_id = $_SESSION[AUTH]['id'];
$timezone  = 'Asia/Ho_Chi_Minh';
date_default_timezone_set($timezone);
$create_at = date_create();
$create_at = date_format($create_at, 'Y-m-d H:i:s');
$insertComment = "insert into comments
                    (user_id, content,create_at,food_id)
                    values
                    ('$user_id','$content','$create_at','$food_id')
";
queryExecute($insertComment, false);
header('location: '. BASE_URL.'detail.php?id='.$food_id);
die;
?>