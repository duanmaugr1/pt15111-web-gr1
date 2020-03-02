<?php 
session_start();
require_once "./config/utils.php";
$email = isset($_POST['email']) == true ? trim($_POST['email']) : "";
$password = isset($_POST['password']) == true ? trim($_POST['password']) : "";

$sql = "select * from users where email = '$email'";
$loggedInUser = queryExecute($sql, false);
if(password_verify($password, $loggedInUser['password'])){
    $_SESSION[AUTH] = $loggedInUser;
    if ($loggedInUser['role_id'] <= 2){
        header('location:'.ADMIN_URL.'dashboard/');
    }
    else {
        header('location: index.php');
    }
    die;
}else{
    header('location: login.php?msg=Sai thông tin đăng nhập!');
    die;
}
 ?>