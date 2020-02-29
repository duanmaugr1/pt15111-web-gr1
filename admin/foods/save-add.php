<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$time = trim($_POST['time']);
$description = trim($_POST['description']);
$address = trim($_POST['address']);
 
$image = $_FILES['image'];
// validate bằng php
$nameerr = "";
 
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

 
// check email đã tồn tại hay chưa
$checkEmailQuery = "select * from foods where name = '$name'";
$foods = queryExecute($checkEmailQuery, true);
if($nameerr == "" && count($foods) > 0){
    $nameerr = "tên thức đã tồn tại, vui lòng sử dụng tên thức ăn khác khác";
}
 
if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "foods/add-form.php?nameerr=$nameerr&emailerr=$emailerr&passworderr=$passworderr");
    die;
}
// mã hóa mật khẩu
// $password = password_hash($password, PASSWORD_DEFAULT);
// upload file ảnh
$filename = "";
if($image['size'] > 0){
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}
$insertUserQuery = "insert into foods 
                          (name, image, price, time, description, address)
                    values 
                          ('$name', '$filename', '$price','$time', '$description', '$address')";
                        //   dd($insertUserQuery);
queryExecute($insertUserQuery, false);
header("location: " . ADMIN_URL . "foods");
die;