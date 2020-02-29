<?php
session_start();
require_once '../../config/utils.php';
$name = $_POST['name'];

$placesId = isset($_POST['id']) ? $_POST['id'] : false;

$checkPlateNumberQuery = "select * from places where name = '$name";

if($placesId !== false){
    $checkPlateNumberQuery .= " and id != $placesId";
}

$name = queryExecute($checkPlateNumberQuery, true);
echo count($name) == 0 ? "true" : "false";