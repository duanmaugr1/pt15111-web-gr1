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

$getFoodByIdQuery = "select * from foods where id = $id";
$foods = queryExecute($getFoodByIdQuery, false);

if (!$foods) {
    header("location: " . ADMIN_URL . 'foods?msg=Thực phẩm không tồn tại');
    die;
}

$nameerr = "";

if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên thực phẩm nằm trong khoảng 2-191 ký tự";
}

$checkFoodQuery = "select * from foods where name = '$name' and id != $id";
$food = queryExecute($checkFoodQuery, true);

if ($nameerr == "" && count($food) > 0) {
    $nameerr = "Tên thực phẩm đã tồn tại, vui lòng sử dụng tên khác";
}

if ($nameerr != "") {
    header('location: ' . ADMIN_URL . "foods/edit-form.php?id=$id&nameerr=$nameerr");
    die;
}

$filename = $foods['image'];

if ($image['size'] > 0) {
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}
$updateFoodQuery = "update foods 
                        set
                            name = '$name', 
                            image = '$filename', 
                            price = $price, 
                            time_start = '$time_start', 
                            time_end = '$time_end', 
                            description = '$description'
                        where id = $id";
queryExecute($updateFoodQuery, false);

$deleteFoodType = "delete from food_type where food_id = $id";
queryExecute($deleteFoodType, false);

$deleteFoodPlace = "delete from food_place where food_id = $id";
queryExecute($deleteFoodPlace, false);

for ($i = 0; $i < count($type); $i++) {
    $insertFoodTypeQuery = "insert into food_type
                           (type_id, food_id)
                        values
                            ('$type[$i]','$id')";

    queryExecute($insertFoodTypeQuery, false);
};
for ($i = 0; $i < count($place); $i++) {
    $insertFoodTypeQuery = "insert into food_place
                           (place_id, food_id)
                        values
                            ('$place[$i]','$id')";
    queryExecute($insertFoodTypeQuery, false);
};

header("location: " . ADMIN_URL . "foods");
die;
