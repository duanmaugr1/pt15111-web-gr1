<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$time = trim($_POST['time']);
$description = trim($_POST['description']);
$address = trim($_POST['address']);
 
$image = $_FILES['image'];

// kiểm tra tài khoản có tồn tại hay không
$getUserByIdQuery = "select * from foods where id = $id";
$foods = queryExecute($getUserByIdQuery, false);

if(!$foods){
    header("location: " . ADMIN_URL . 'foods?msg=Tài khoản không tồn tại');die;
}

// kiểm tra xem có quyền để thực hiện edit hay không
if($foods['id'] != $_SESSION[AUTH]['id'] && $foods['role_id'] >= $_SESSION[AUTH]['role_id'] ){
    header("location: " . ADMIN_URL . 'foods?msg=Bạn không có quyền sửa thông tin tài khoản này');die;
}

// validate bằng php
$nameerr = "";
 
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}
 
// check name đã tồn tại hay chưa
$checkEmailQuery = "select * from foods where name = '$name' and id != $id";
$foods = queryExecute($checkEmailQuery, true);
if($nameerr == "" && count($foods) > 0){
    $nameerr = "name đã tồn tại, vui lòng sử dụng email khác";
}

if($nameerr . $emailerr != "" ){
    header('location: ' . ADMIN_URL . "foods/edit-form.php?id=$id&nameerr=$nameerr&emailerr=$emailerr");
    die;
}

// upload file
$filename = $foods['image'];
if($image['size'] > 0){
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}

$updateUserQuery = "update foods 
                    set
                          name = '$name', 
                          image = '$filename', 
                          price = $price, 
                          time = '$time', 
                          description = '$description', 
                          address = '$address'
                    where id = $id";
                    // dd($updateUserQuery);
queryExecute($updateUserQuery, false);
header("location: " . ADMIN_URL . "foods");
die;