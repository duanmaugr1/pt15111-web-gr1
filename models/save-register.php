<?php
require_once '../config/utils.php';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$cfpassword = trim($_POST['cfpassword']);
$phone_number = trim($_POST['phone_number']);

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check email
if(strlen($email) == 0){
    $emailerr = "Yêu cầu nhập email!";
}
if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailerr = "Không đúng định dạng email";
}
// check email đã tồn tại hay chưa
$checkEmailQuery = "select * from users where email = '$email'";
$users = queryExecute($checkEmailQuery, true);
if($emailerr == "" && count($users) > 0){
    $emailerr = "Email đã tồn tại, vui lòng sử dụng email khác";
}
// check password
if(strlen($password) < 6){
    $passworderr = "Mật khẩu cần >= 6 ký tự";
}

if($passworderr == "" && $password != $cfpassword){
    $passworderr = "Mật khẩu và nhập lại mật khẩu không khớp nhau";
}

if($nameerr . $emailerr . $passworderr != "" ){
    header('location: ' . BASE_URL . "register.php?nameerr=$nameerr&emailerr=$emailerr&passworderr=$passworderr");
    die;
}
// mã hóa mật khẩu
$password = password_hash($password, PASSWORD_DEFAULT);

$insertUserQuery = "insert into users 
                          (name, password, email, phone_number, role_id, active)
                    values 
                          ('$name', '$password', '$email', '$phone_number', '3',  '1')";
queryExecute($insertUserQuery, false);
header("location: " . BASE_URL . "login.php");
die;
