<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);

// validate bằng php
$namer = "";

if(strlen($name) < 2 || strlen($name) > 191){
    $namer = "Yêu cầu nhập trong khoảng 2-191 ký tự";
}

// check plate_number đã tồn tại hay chưa
$checkNameQuery = "select * from places where name = '$name'";
$names = queryExecute($checkNameQuery, true);
if($names == "" && count($plates) > 0){
    $namer = "Địa điểm đã tồn tại, vui lòng nhập địa điểm khác";
}


$insertVehicleQuery = "insert into places 
                          (name)
                    values 
                          ('$name')";

// dd($insertVehicleQuery);
queryExecute($insertVehicleQuery, false);

header("location: " . ADMIN_URL . "places?msg=Thêm địa điểm thành công");
die;