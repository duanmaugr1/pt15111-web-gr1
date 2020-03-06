<?php
session_start();
checkAdminLoggedIn();
require_once '../../config/utils.php';
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getCommentRemove = 'select * from comments where id = "$id"';
$commentRemove = queryExecute($getCommentRemove, false);

if (!$commentRemove) {
    header("location: ". ADMIN_URL. "comments?msg=Bình luận không tồn tại.");
}

$removeComments = 'delete from comments where id = "$id"';
$remove = queryExecute($removeComments, false);
header("location: .".ADMIN_URL."comments?msg=Xóa bình luận thành công.");
die;
