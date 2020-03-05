<?php 
// bắt đầu sử dụng session
session_start();
require_once "./config/utils.php";
// $loggedInUser = $_SESSION[AUTH];
$typeQuery = 'select * from types';
$types = queryExecute($typeQuery, true);
// echo $loggedInUser['name'];

$placeQuery = 'select * from places';
$places = queryExecute($placeQuery, true);

$getFoodTypePlaceQuery = "select 
                        f.*,
                        t.name type_name,
                        p.name place_name
                        from foods f 
                        join food_type tf
                        on f.id = tf.food_id 
                        join types t
                        on t.id = tf.type_id
                        join food_place pf
                        on f.id = pf.food_id
                        join places p
                        on p.id = pf.place_id
                        ";
$foods = queryExecute($getFoodTypePlaceQuery, true);
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
    								<div class="title_holder">
    									<h3>KHÁM PHÁ CÁC MÓN ĂN NGON NHẤT</h3>
										<span>Direct-Food sẽ giúp bạn khám phá các món ăn bạn muốn</span>
    								</div>
    								<div class="searching">
    									<input class="directify_fn_search_input" type="search" name="keyword" placeholder="Nhập tên món ăn bạn muốn tìm?" />
    									<a class="directify_fn_search_btn" href="#"><img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/search.svg" alt="" /><span>Tìm kiếm</span></a>
    								</div>
    								<div class="cat_single_wrap" data-hover-text="#fff" data-hover-bg="" data-hover-border="rgba(255,255,255,1)" data-skew="6" data-text-color="#fff" data-bg-color="" data-bg-opacity="" data-border-width="1" data-border-color="rgba(255,255,255,0.64)" >
										<div class="cat_single">
											<div class="cat_single_bg">
												<div class="overlay_color"></div>
											</div>
											<div class="cat_single_content">
												<a href="index.php">
													<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/restaurant.svg" alt="" />
													<span class="cat_title">Các Món Ăn</span>
												</a>
											</div>
										</div>
										<div class="cat_single">
											<div class="cat_single_bg">
												<div class="overlay_color"></div>
											</div>
											<div class="cat_single_content">
												<a href="#">
													<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/hotel.svg" alt="" />
													<span class="cat_title">Địa Điểm</span>
												</a>
											</div>
										</div>
										<div class="cat_single">
											<div class="cat_single_bg">
												<div class="overlay_color"></div>
											</div>
											<div class="cat_single_content">
												<a href="#">
													<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/shopping.svg" alt="" />
													<span class="cat_title">Các Loại Món</span>
												</a>
											</div>
										</div>
										<div class="cat_single">
											<div class="cat_single_bg">
												<div class="overlay_color"></div>
											</div>
											<div class="cat_single_content">
												<a href="#">
													<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/gallery.svg" alt="" />
													<span class="cat_title">Thư Viện Ảnh</span>
												</a>
											</div>
										</div>
										<div class="cat_single">
											<div class="cat_single_bg">
												<div class="overlay_color"></div>
											</div>
											<div class="cat_single_content">
												<a href="#">
													<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/service.svg" alt="" />
													<span class="cat_title">Dịch Vụ</span>
												</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<!-- #1 item -->
									<div class="fdbox">
										<?php foreach ($foods as $food):?>
										<div class="featured_box_wrap">
											<div class="featured_box">
												<div class="featured_box_img">
													<img src="<?= BASE_URL.$food['image']?>" alt="" />
												</div>
												<div class="featured_box_price">
													<span class="text"><?= $food['price']?>VNĐ</span>
													<span class="after"></span>
												</div>
												<div class="featured_box_info_wrap">
													<div class="featured_box_info">
														<div class="featured_box_like">
															<a href="#">
																<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/bookmark.svg" alt="" />
															</a>
															<div class="featured_box_tooltip">
																<span>Bookmark</span>
															</div>
														</div>
														<div class="featured_box_title">
															<h3><a href="#"><?= $food['name']?></a></h3>
														</div>
														<div class="directify_fn_rating" data-rating="4.2">
															<div class="behind">
																<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/review.svg" alt="" />
															</div>
															<div class="up">
																<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/review.svg" alt="" />
															</div>
															<div class="featured_box_preview">
																<a href="#"><span>Preview</span></a>
															</div>
														</div>
														<div class="featured_box_address">
															<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/placeholder.svg" alt="" />
															<span><?= $food['place_name']?></span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach;?>
   									</div>
										<!-- /#1 item -->
    							</div>
							</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	
    	<!-- FAMOUS FOODS HOVERTAB -->
    	<div class="directify_fn_tab_famous_cities_wrap">
    		<div class="directify_fn_tab_famous_cities">
    			<div class="tab_famous_cities">
    				<div class="container">
						<div class="directify_fn_tabs" data-skin="light" data-x-pos="left">
							<div class="title_holder">
								<h3>CÁC MÓN ĂN NGON BẠN NÊN THỬ</h3>
								<span class="title">Các món ăn được đề cử</span>
								<span class="line"></span>
							</div>
							<ul class="fam_city tabHeader">
								<li>
									<a href="#">
										<div class="fam_city_wrap">
											<div class="number">
												<span class="text">01</span>
												<span class="after"></span>
											</div>
											<div class="fam_city_content">
												<div class="title_holder">
													<h3>Món khai vị</h3>
<!--													<span>227 Listings</span>-->
												</div>
												<div class="arrow">
													<i class="xcon-angle-right"></i>
												</div>
											</div>
											<div class="hidden_img">
												<img src="<?= THEME_ASSET_URL ?>img/" alt="" />
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="fam_city_wrap">
											<div class="number">
												<span class="text">02</span>
												<span class="after"></span>
											</div>
											<div class="fam_city_content">
												<div class="title_holder">
													<h3>Món thịt</h3>
<!--													<span>154 Listings</span>-->
												</div>
												<div class="arrow">
													<i class="xcon-angle-right"></i>
												</div>
											</div>
											<div class="hidden_img">
												<img src="<?= THEME_ASSET_URL ?>img/" alt="" />
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="fam_city_wrap">
											<div class="number">
												<span class="text">03</span>
												<span class="after"></span>
											</div>
											<div class="fam_city_content">
												<div class="title_holder">
													<h3>Món ăn nhanh</h3>
<!--													<span>854 Listings</span>-->
												</div>
												<div class="arrow">
													<i class="xcon-angle-right"></i>
												</div>
											</div>
											<div class="hidden_img">
												<img src="<?= THEME_ASSET_URL ?>img/" alt="" />
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="fam_city_wrap">
											<div class="number">
												<span class="text">04</span>
												<span class="after"></span>
											</div>
											<div class="fam_city_content">
												<div class="title_holder">
													<h3>Món tráng miệng</h3>
<!--													<span>239 Listings</span>-->
												</div>
												<div class="arrow">
													<i class="xcon-angle-right"></i>
												</div>
											</div>
											<div class="hidden_img">
												<img src="<?= THEME_ASSET_URL ?>img/" alt="" />
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="fam_city_wrap">
											<div class="number">
												<span class="text">05</span>
												<span class="after"></span>
											</div>
											<div class="fam_city_content">
												<div class="title_holder">
													<h3>Món nướng</h3>
<!--													<span>634 Listings</span>-->
												</div>
												<div class="arrow">
													<i class="xcon-angle-right"></i>
												</div>
											</div>
											<div class="hidden_img">
												<img src="<?= THEME_ASSET_URL ?>img/" alt="" />
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="fam_city_wrap">
											<div class="number">
												<span class="text">06</span>
												<span class="after"></span>
											</div>
											<div class="fam_city_content">
												<div class="title_holder">
													<h3>Món lẩu</h3>
													<span></span>
												</div>
												<div class="arrow">
													<i class="xcon-angle-right"></i>
												</div>
											</div>
											<div class="hidden_img">
												<img src="<?= THEME_ASSET_URL ?>img/" alt="" />
											</div>
										</div>
									</a>
								</li>
							</ul>
							<div class="tabContent">
								<nav>
									<div class="active"><a href="#"></a><nav class="overlay"></nav></div>
									<div class=""><a href="#"></a><nav class="overlay"></nav></div>
									<div class=""><a href="#"></a><nav class="overlay"></nav></div>
									<div class=""><a href="#"></a><nav class="overlay"></nav></div>
									<div class=""><a href="#"></a><nav class="overlay"></nav></div>
									<div class=""><a href="#"></a><nav class="overlay"></nav></div>
								</nav>
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- /FAMOUS CITIES HOVERTAB -->
    	
    
    	
    	
    	<!-- FROM OUR BLOG -->
    	<div class="directify_fn_exmblog_wrap">
    		<div class="directify_fn_exmblog">
    			<div class="exmblog_wrap">
    				<div class="container">
    					<div class="exmblogs">
    						<div class="title_holder">
								<h3>Blog Của Chúng Tôi</h3>
								<span class="title">Chúng tôi cập nhật và thêm các bài review hằng ngày.</span>
								<span class="line"></span>
							</div>
    						<div class="exmblog_single_wrap">
    							<div class="exmblog_single">
    								<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/open-book.svg" alt="" />
    								<div class="title_holder">
    									<h3><a href="#">Trang web tốt nhất cho reviewer</a></h3>
    									<span class="title">Viết bài review cho món ăn bạn thích</span>
    									<span class="read_more"><a href="#">Read More</a><span class="date"> - April 01</span></span>
    								</div>
    							</div>
    							<div class="exmblog_single">
    								<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/open-book.svg" alt="" />
    								<div class="title_holder">
    									<h3><a href="#">Tìm hiểu về các món ăn nổi tiếng</a></h3>
    									<span class="title">Cras aliquam sagittis urna in consectetur. Aenean felis lacus.</span>
    									<span class="read_more"><a href="#">Read More</a><span class="date"> - March 27</span></span>
    								</div>
    							</div>
    							<div class="exmblog_single">
    								<img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/open-book.svg" alt="" />
    								<div class="title_holder">
    									<h3><a href="#">Lời khuyên về những món ăn</a></h3>
    									<span class="title">Cras aliquam sagittis urna in consectetur. Aenean felis lacus.</span>
    									<span class="read_more"><a href="#">Read More</a><span class="date"> - January 18</span></span>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- /FROM OUR BLOG -->
    	
    </div>
    <!-- /CONTENT -->
    
    <!-- FOOTER -->
    <?php include_once '_share/footer.php'?>
    <!-- /FOOTER -->
    
    <a class="totop" href="#"><i class="xcon-angle-up"></i></a>
    <a class="listed" href="submit.php"><img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/pencil.svg" alt="" /></a>
   
</div>
<!-- /WRAPPER ALL -->

<!-- SCRIPTS -->
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/jquery.js"></script>
<!--[if lt IE 11]> <script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/ie8.js"></script> <![endif]-->	
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/plugins.js"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/carousel.js"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/leaflet.js"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/MarkerClusterGroup.js"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/markers.js"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/map.js"></script>
<script type="text/javascript" src="<?= THEME_ASSET_URL ?>js/init.js"></script>

</body>

<!-- Mirrored from frenify.com/envato/frenify/html/directify/1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 03:34:26 GMT -->
</html>