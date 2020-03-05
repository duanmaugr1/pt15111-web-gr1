<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
?>
<!DOCTYPE html>
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="description" content="Directify">
<meta name="author" content="Frenify">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Directify | Submit</title>

<link href=" https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Work+Sans:300,400,500,600,700,800,900" rel="stylesheet">

<!-- STYLES -->
<link rel="stylesheet" type="text/css" href=" css/skeleton.css" />
<link rel="stylesheet" type="text/css" href=" css/base.css" />
<link rel="stylesheet" type="text/css" href=" css/fontello.css" />
<link rel="stylesheet" type="text/css" href=" css/carousel.css" />
<link rel="stylesheet" type="text/css" href=" css/select.css" />
<link rel="stylesheet" type="text/css" href=" css/colors.css" />
<link rel="stylesheet" type="text/css" href=" css/magnific-popup.css" />
<link rel="stylesheet" type="text/css" href=" css/leaflet.css" />
<link rel="stylesheet" type="text/css" href=" css/hamburgers.css" />
<link rel="stylesheet" type="text/css" href=" css/range.css" />

<link rel="stylesheet" type="text/css" href=" js/effect/component.html" />

<link rel="stylesheet" type="text/css" href=" css/style.css" />
<!--[if lt IE 9]> <script type="text/javascript" href=" js/modernizr.custom.js"></script> <![endif]-->

</head>

<body>

<!-- WRAPPER ALL -->
  
    <!-- /HEADER -->
    
    <!-- CONTENT -->
    <div class="directify_fn_content">
    	
    	<!-- IMAGE HOLDER -->
    	<div class="directify_fn_submit_img_holder">
    		<div class="overlay_color"></div>
    		<div class="overlay_image jarallax" data-speed="0.2"></div>
    	</div>
    	<!-- /IMAGE HOLDER -->
    	
    	<!-- SUBMIT CONTENT -->
    	<div class="directify_fn_submit_content">
    		<div class="directify_fn_submit">
    			<div class="submit">
    				<form action="save-add.php" method="POST" enctype="multipart/form-data">
    					<div class="directify_fn_submit_form">
							<div class="directify_fn_submit_listing_section">
								<div class="sign-email">
									<label>name<span>*</span></label>
									<input type="text" id="sign-email" name="name"/>
								</div>
								<div class="form-group">
                                
								<div class="row">
									<div class="col-md-3 offset-md-3">
										<img src="#" id="preview-img" class="img-fluid">
									</div>
								</div>
	
									<label for="">Ảnh<span class="text-danger">*</span></label>
									<input type="file" class="form-control" name="image" onchange="encodeImageFileAsURL(this)">
								</div>
								<!-- fasdfasdfasdfsdf -->
								<div class="sign-listing-tagline">
									<label>price</label>
									<input type="number" id="sign-listing-tagline" name="price" />
								</div>
								<div class="sign-listing-category">
									<label>time start</label>
									<input type="time" id="sign-email" name="time_start"/>
								</div>
								<div class="sign-listing-category">
									<label>time end</label>
									<input type="time" id="sign-email" name="time_end"/>
								</div>
								<div class="sign-listing-description">
									<label>Description</label>
									<textarea id="sign-listing-description" cols="3" rows="10" name="Description"></textarea>
								</div>
								<div class="sign-email">
									<label>address<span>*</span></label>
									<input type="text" id="sign-email" name="address"/>
								</div>
								<input type="submit" value="Submit Your Review" />
							</div>
   						</div>
    				</form>
    			</div>
    		</div>
    	</div>
    	<!-- /SUBMIT CONTENT -->
	</div>
	
<script type="text/javascript" href=" js/jquery.js"></script>
</body>

<!-- Mirrored from frenify.com/envato/frenify/html/directify/1/submit.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 03:36:23 GMT -->
</html>