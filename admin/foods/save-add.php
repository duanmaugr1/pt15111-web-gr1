<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$type = trim($_POST['type']);
$place = trim($_POST['place']);

$time_start = trim($_POST['time_start']);
$time_end = trim($_POST['time_end']);
$price = trim($_POST['price']);
$description = trim($_POST['description']);
 
$image = $_FILES['image'];
// validate bằng php
$nameerr = "";
 
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

 
// check email đã tồn tại hay chưa
$checkFoodQuery = "select * from foods where name = '$name'";
$foods = queryExecute($checkFoodQuery, true);
if($nameerr == "" && count($foods) > 0){
    $nameerr = "tên thức đã tồn tại, vui lòng sử dụng tên thức ăn khác khác";
}
 
if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "foods/add-form.php?nameerr=$nameerr");
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
$insertFoodQuery = "insert into foods 
                          (name, image, type, place, price, time_start, time_end, description)
                    values 
                          ('$name', '$filename', '$type','$place', '$price', '$time_start', '$time_end', '$description')";
queryExecute($insertFoodQuery, true );
$getTypeQuery = "select type from foods";
$get = queryExecute($getTypeQuery,true);
dd($get);

$getFoodIdQuery = "select id from foods where name = '$name'";
queryExecute($getFoodIdQuery);

$insertFoodTypeQuery = "insert into food_type
                           (type_id, food_id)
                        values
                            ('$type','$data'";
$twoId = QueryExecute($insertFoodTypeQuery, true);
header("location: " . ADMIN_URL . "foods/");
die;