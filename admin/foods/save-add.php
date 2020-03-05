<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$type = $_POST['type'];
$place = $_POST['place'];
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
                          (name, image, price, time_start, time_end, description)
                    values 
                          ('$name', '$filename', '$price', '$time_start', '$time_end', '$description')";
queryExecute($insertFoodQuery, true );
$getTypeQuery = "select type from foods";
$get = queryExecute($getTypeQuery,true);
//lấy id của foods
//thêm vào bảng food_type
//thêm vào bảng food_place
$getFoodIdQuery = "select id from foods where name = '$name'";
$idFoodArray = queryExecute($getFoodIdQuery);
$idFood = $idFoodArray[0];

$insertFoodTypeQuery = "insert into food_type
                           (type_id, food_id)
                        values
                            ('$type','$idFood')";
queryExecute($insertFoodTypeQuery, true);

$insertFoodPlaceQuery = "insert into food_place
                            (place_id, food_id)
                        values
                            ('$place','$idFood')";
queryExecute($insertFoodPlaceQuery, true);
header("location: " . ADMIN_URL . "foods/");
die;