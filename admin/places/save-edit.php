<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);

// validate bằng php
$nameer = "";


if(strlen($name) < 2 || strlen($name) > 191){
    $nameer = "Yêu cầu nhập trong khoảng 2-191 ký tự";
}


// check plate_number đã tồn tại hay chưa
$checkPlateQuery = "select * from places where name = '$name' and id != $id";

$plates = queryExecute($checkPlateQuery, true);
if($plates == "" && count($plates) > 0){
    $nameer = "Địa điểm đã tồn tại, vui lòng sử dụng biển số khác";
}


if($nameer != "" ){
    header('location: ' . ADMIN_URL . "places/edit-form.php?nameer=$nameer");
    die;
}

$updatePlacesQuery = "update places
                    set
                          name = '$name'
                         
                    where id = '$id'";

// dd($updatePlacesQuery);
queryExecute($updatePlacesQuery, false);

header("location: " . ADMIN_URL . "places?msg=Sửa thông tin địa điểm thành công");
die;