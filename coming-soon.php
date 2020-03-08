<?php
// bắt đầu sử dụng session
session_start();

require_once "./config/utils.php";
// $loggedInUser = $_SESSION[AUTH];
$keyword = isset($_GET['keyword']) == true? $_GET['keyword'] : "";
$keyword2 = isset($_GET['keyword2']) == true? $_GET['keyword2'] : "";
$typeId = isset($_GET['typeSearch']) == true ? $_GET['typeSearch'] : "";
$placeId = isset($_GET['placeSearch']) == true ? $_GET['placeSearch'] : "";

$typeQuery = 'select * from types';
$indextypes = queryExecute($typeQuery, true);
// echo $loggedInUser['name'];

$placeQuery = 'select * from places';
$indexplaces = queryExecute($placeQuery, true);

$foodQuery = "select * from foods ORDER BY id DESC LIMIT 6";

if ($keyword2 !== ""){
    $foodQuery .= " where (name like '%$keyword2%')";
}

if ($keyword !== "" && $placeId !== "" && $typeId !== ""){
    $foodQuery = "select * from foods join food_type  
                                            on food_type.food_id = foods.id
                                            join food_place
										    on food_place.food_id = foods.id
										    where (
										    food_type.type_id = $typeId
										    and food_place.place_id = $placeId
										    and foods.name like '%$keyword%')";
}

if ($keyword == "" && $placeId !== "" && $typeId !== ""){
    $foodQuery = "select * from foods join food_type  
                                            on food_type.food_id = foods.id
                                            join food_place
										    on food_place.food_id = foods.id
										    where (
										    food_type.type_id = $typeId
										    and food_place.place_id = $placeId)";
}

if ($keyword !== "" && $placeId == 0 && $typeId !== ""){
    $foodQuery = "select * from foods join food_type  
                                            on food_type.food_id = foods.id
										    where (
										    food_type.type_id = $typeId
										    
										    and foods.name like '%$keyword%')";
}

if ($keyword !== "" && $placeId !== "" && $typeId == 0){
    $foodQuery = "select * from foods 
                                            join food_place
										    on food_place.food_id = foods.id
										    where (
                                            food_place.place_id = $placeId
										    and foods.name like '%$keyword%')";
}

if ($keyword !== "" && $placeId == 0 && $typeId == 0){
    $foodQuery = "select * from foods 
										    where (
										    
										     foods.name like '%$keyword%')";
}

if ($keyword == "" && $placeId !== "" && $typeId == 0){
    $foodQuery = "select * from foods 
                                            join food_place
										    on food_place.food_id = foods.id
										    where (
                                            food_place.place_id = $placeId )";
}

if ($keyword == "" && $placeId == 0 && $typeId !== ""){
    $foodQuery = "select * from foods join food_type
                                            on food_type.food_id = foods.id
										    where (
										    food_type.type_id = $typeId
										    )";
}

if ($keyword == "" && $placeId == 0 && $typeId == 0){
    $foodQuery = "select * from foods ORDER BY id DESC LIMIT 6";
}

$foods = queryExecute($foodQuery, true);
//dd($foodQuery);

$getFoodIdQuery = "select id from foods";
$foodId = queryExecute($getFoodIdQuery, true);

for ($i = 0; $i < count($foods); $i++) {
    $getAddressQuery = "select p.id,
						p.name
						from food_place fp
						join places p 
						on fp.place_id = p.id
						where fp.food_id = " . $foods[$i]['id'];
    $places = queryExecute($getAddressQuery, true);
    $foods[$i]['places'] = $places;

    $getTypeQuery = "select t.id,
							t.name
					from food_type ft
					join types t
					on ft.type_id = t.id
					where ft.food_id = 
					" . $foods[$i]['id'];
    $types = queryExecute($getTypeQuery, true);
    $foods[$i]['types'] = $types;
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<!-- Mirrored from frenify.com/envato/frenify/html/directify/1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 03:34:00 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Directify">
    <meta name="author" content="Frenify">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Directify</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Work+Sans:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= PUBLIC_URL. 'css/main_font.css'?>">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> -->


    <?php include_once '_share/style.php'?>

</head>

<body>

<!-- WRAPPER ALL -->
<div class="directify_fn_wrapper_all">
    <!-- MOBILE MENU -->
    <?php include_once  '_share/mobilemenu.php'?>
    <!-- /MOBILE MENU -->

    <!-- HEADER -->
    <?php include_once  '_share/header.php'?>
    <!-- /HEADER -->

    <!-- CONTENT -->
    <div class="directify_fn_content">

        <div class="directify_fn_all_listings_wrap index10 index30">
            <div class="directify_fn_all_listings_bg">
                <div class="overlay_color"></div>
                <div class="overlay_image"></div>
            </div>
            <div class="directify_fn_all_listings">
                <div class="all_listings">
                    <div class="container">
                        <div class="listings_wrap">
                            <div class="discovering_wrap">
                                <div class="discovering">
                                    <div class="text-light">
                                        <p style="color: #f0f0f0; font-size: 120px">Chức năng đang phát triển</p>
                                    </div>
                                    <div>
                                        <a href="<?= BASE_URL . 'index.php' ?>"><p style="color: #f0f0f0; font-size: 40px">Quay lại</p></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /CONTENT -->

    <!-- FOOTER -->
    <?php include_once '_share/footer.php'?>
    <!-- /FOOTER -->

    <a class="totop" href="#"><i class="xcon-angle-up"></i></a>
    <a class="listed" href="submit.html"><img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/pencil.svg" alt="" /></a>

</div>
<!-- /WRAPPER ALL -->

<!-- SCRIPTS -->
<?php include_once '_share/script.php'?>

</body>

<!-- Mirrored from frenify.com/envato/frenify/html/directify/1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 03:34:26 GMT -->
</html>