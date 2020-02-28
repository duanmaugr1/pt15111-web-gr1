<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$plate_number = trim($_POST['plate_number']);
$type_id = $_POST['type_id'];
$owner_id = trim($_POST['owner_id']);
$manufacture = trim($_POST['manufacture']);
$color = trim($_POST['color']);
$model = trim($_POST['model']);

// validate bằng php
$plate_numbererr = "";
$owner_iderr = "";
$manufactureerr = "";
$colorerr = "";
$modelerr = "";

if(strlen($plate_number) < 2 || strlen($plate_number) > 191){
    $plate_numbererr = "Yêu cầu nhập trong khoảng 2-191 ký tự";
}
if(strlen($plate_number) == 0){
    $plate_numbererr = "Yêu cầu nhập biển số xe";
}

if(strlen($owner_id) == 0){
    $emailerr = "Yêu cầu nhập mã số người dùng";
}
if(strlen($manufacture) == 0){
    $manufactureerr = "Yêu cầu nhập hãng xe";
}
if(strlen($color) == 0){
    $colorerr = "Yêu cầu nhập màu sắc";
}
if(strlen($model) == 0){
    $modelerr = "Yêu cầu nhập model";
}

// check plate_number đã tồn tại hay chưa
$checkPlateQuery = "select * from vehicles where plate_number = '$plate_number' and id != $id";

$plates = queryExecute($checkPlateQuery, true);
if($plates == "" && count($plates) > 0){
    $plate_numbererr = "Biển số đã tồn tại, vui lòng sử dụng biển số khác";
}


if($plate_numbererr . $owner_iderr . $manufactureerr . $colorerr . $modelerr != "" ){
    header('location: ' . ADMIN_URL . "vehicles/edit-form.php?plate_numbererr=$plate_numbererr&owner_iderr=$owner_iderr&manufactureerr=$manufactureerr&colorerr=$colorerr&modelerr=$modelerr");
    die;
}

$updateVehicleQuery = "update vehicles 
                    set
                          plate_number = '$plate_number', 
                          type_id = '$type_id', 
                          owner_id = '$owner_id', 
                          manufacturer = '$manufacture', 
                          color = '$color',
                          model = '$model'
                    where id = '$id'";


queryExecute($updateVehicleQuery, false);

header("location: " . ADMIN_URL . "vehicles?msg=Sửa thông tin phương tiện thành công");
die;