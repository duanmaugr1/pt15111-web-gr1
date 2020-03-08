<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$type = $_POST['type'];
$place = $_POST['place'];
$price = trim($_POST['price']);
$time_start = trim($_POST['time_start']);
$time_end = trim($_POST['time_end']);
$description = trim($_POST['description']);
 
$image = $_FILES['image'];

// kiểm tra tài khoản có tồn tại hay không
$getFoodByIdQuery = "select * from foods where id = $id";
$foods = queryExecute($getFoodByIdQuery, false);

if(!$foods){
    header("location: " . ADMIN_URL . 'foods?msg=Tài khoản không tồn tại');die;
}

// validate bằng php
$nameerr = "";
 
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}
 
// check name đã tồn tại hay chưa
$checkFoodQuery = "select * from foods where name = '$name' and id != $id";
$foods = queryExecute($checkFoodlQuery, true);
if($nameerr == "" && count($foods) > 0){
    $nameerr = "name đã tồn tại, vui lòng sử dụng email khác";
}

if($nameerr != "" ){
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
if($filename==null){
    $updateFoodQuery = "update foods 
                        set
                            name = '$name',
                            price = $price, 
                            time_start = '$time_start', 
                            time_end = '$time_end', 
                            description = '$description'
                        where id = $id";
} else{
    $updateFoodQuery = "update foods 
                        set
                            name = '$name', 
                            image = '$filename', 
                            price = $price, 
                            time_start = '$time_start', 
                            time_end = '$time_end', 
                            description = '$description'
                        where id = $id";    
}
queryExecute($updateFoodQuery, false);

$deleteFoodType = "delete from food_type where food_id = $id";
queryExecute($deleteFoodType, false);

$deleteFoodPlace = "delete from food_place where food_id = $id";
queryExecute($deleteFoodPlace, false);

for ($i = 0; $i < count($type); $i++){
    $insertFoodTypeQuery = "insert into food_type
                           (type_id, food_id)
                        values
                            ('$type[$i]','$id')";

    queryExecute($insertFoodTypeQuery, false);
};
for ($i = 0; $i < count($place); $i++){
    $insertFoodTypeQuery = "insert into food_place
                           (place_id, food_id)
                        values
                            ('$place[$i]','$id')";
    queryExecute($insertFoodTypeQuery, false);
};

header("location: " . ADMIN_URL . "foods");
die;