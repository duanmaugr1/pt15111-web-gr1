<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 2/17/20
 * Time: 18:41
 * 1. lấy id xuống
 * 2. kiểm tra xem có quyền để xóa tài khoản với id đc nhận hay không
 * 4. thực hiện câu lệnh xóa với csdl
 * 5. điều hướng về danh sách
 *
 */
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemovePlacesQuery = "select * from places where id = $id ";
$removePlaces = queryExecute($getRemovePlacesQuery, false);
if(!$removePlaces){
    header("location: " . ADMIN_URL . "places?msg=Địa điểm không tồn tại");
    die;
}

//if($removeUser['role_id'] >= $_SESSION[AUTH]['role_id']){
//    header("location: " . ADMIN_URL . "users?msg=Không đủ quyền hạn thực hiện hành động này");
//    die;
//}

$removePlacesQuery = "delete from places where id = $id ";
queryExecute($removePlacesQuery, false);
header("location: " . ADMIN_URL . "places?msg=Xóa địa điểm thành công");
die;