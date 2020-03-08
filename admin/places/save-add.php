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

// check đã tồn tại hay chưa
$checkNameQuery = "select * from places where name = '$name'";
$names = queryExecute($checkNameQuery, true);
if(count($names) != 0){
    $namer = "Địa điểm đã tồn tại, vui lòng nhập địa điểm khác";
}

if ($namer != ""){
    header ("location: ". ADMIN_URL . "places/add-form.php?namer=$namer");
    die;
}


$insertVehicleQuery = "insert into places 
                          (name)
                    values 
                          ('$name')";

// dd($insertVehicleQuery);
queryExecute($insertVehicleQuery, false);

header("location: " . ADMIN_URL . "places?msg=Thêm địa điểm thành công");
die;