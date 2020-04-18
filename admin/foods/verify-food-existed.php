<?php
session_start();
require_once '../../config/utils.php';
$name = $_POST['nameData'];
$foodId = isset($_POST['idData']) ? $_POST['idData'] : false;
$checkFoodQuery = "select * from foods where name = '$name'";

if ($foodId !== false) {
    $checkFoodQuery .= " and id != $foodId";
}

$foods = queryExecute($checkFoodQuery, true);
echo count($foods) == 0 ? "true" : "false";
