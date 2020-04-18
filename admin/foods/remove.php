<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveFoodQuery = "select * from foods where id = $id";
$removeFood = queryExecute($getRemoveFoodQuery, false);

if (!$removeFood) {
    header("location: " . ADMIN_URL . "foods?msg=Thực phẩm không tồn tại");
    die;
}

$removeFoodQuery = "delete from foods where id = $id";
queryExecute($removeFoodQuery, false);
header("location: " . ADMIN_URL . "foods?msg=Xóa thực phẩm thành công");
die;
