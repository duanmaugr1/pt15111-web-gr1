<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);

// validate bằng php
$nameerr = "";
$nameExisterr = "";
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên loại thức ăn trong khoảng 2-191 ký tự";
}

// check loại thực phẩm đã tồn tại hay chưa
$checkTypeQuery = "select * from types where name = '$name'";
$types = queryExecute($checkTypeQuery, true);
if($nameExisterr == "" && count($types) > 0){
    $nameExisterr = "Loại thức ăn đã tồn tại";
}

if($nameerr!= "" ){
    header('location: ' . ADMIN_URL . "types/add-form.php?nameerr=$nameerr&nameExisterr=$nameExisterr");
    die;
}
$insertTypeQuery = "insert into types (name) values
                          ('$name')";
                        //   dd($insertTypeQuery);
queryExecute($insertTypeQuery, false);
header("location: " . ADMIN_URL . "types");
die;