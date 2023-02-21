<?php
session_start();
error_reporting(0);
include 'includes/config.php';

$pid = intval($_GET['pid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">
	<title>Product Details</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
	<link href="assets/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/rateit.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="assets/images/favicon.ico">
</head>

<body class="cnt-home">

	<header class="header-style-1">
		<!-- ============================================== NAVBAR ============================================== -->
		<?php include 'includes/menu-bar.php'; ?>
		<!-- ============================================== NAVBAR : END ============================================== -->
	</header>

	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row single-product outer-bottom-sm '>
				<?php
				$ret = mysqli_query($con, "select * from products where id='$pid'");
				while ($row = mysqli_fetch_array($ret)) { ?>
					<div class='col-md-12'>
						<div class="row  wow fadeInUp">
							<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
								<div class="product-item-holder size-big single-product-gallery small-gallery">

									<div id="owl-single-product">

										<div class="single-product-gallery-item" id="slide1">
											<a data-lightbox="image-1" data-title="<?php echo htmlentities(
																						$row['productName']
																					); ?>" href="admin/productimages/<?php echo htmlentities(
																															$row['id']
																														); ?>/<?php echo htmlentities($row['productImage1']); ?>">
												<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities(
																																					$row['id']
																																				); ?>/<?php echo htmlentities(
																																							$row['productImage1']
																																						); ?>" width="370" height="350" />
											</a>
										</div>




										<div class="single-product-gallery-item" id="slide1">
											<a data-lightbox="image-1" data-title="<?php echo htmlentities(
																						$row['productName']
																					); ?>" href="admin/productimages/<?php echo htmlentities(
																															$row['id']
																														); ?>/<?php echo htmlentities($row['productImage1']); ?>">
												<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities(
																																					$row['id']
																																				); ?>/<?php echo htmlentities(
																																							$row['productImage1']
																																						); ?>" width="370" height="350" />
											</a>
										</div><!-- /.single-product-gallery-item -->

										<div class="single-product-gallery-item" id="slide2">
											<a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities(
																															$row['id']
																														); ?>/<?php echo htmlentities($row['productImage2']); ?>">
												<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities(
																																					$row['id']
																																				); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
											</a>
										</div><!-- /.single-product-gallery-item -->

										<div class="single-product-gallery-item" id="slide3">
											<a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities(
																															$row['id']
																														); ?>/<?php echo htmlentities($row['productImage3']); ?>">
												<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities(
																																					$row['id']
																																				); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
											</a>
										</div>

									</div><!-- /.single-product-slider -->


								</div>
							</div>




							<div class='col-sm-6 col-md-7 product-info-block'>
								<div class="product-info">
									<h1 class="name"><?php echo htmlentities($row['productName']); ?></h1>
									<p class="descrip_heading"><?php echo ($row['productDescription']); ?></p>
									<?php
									$rt = mysqli_query(
										$con,
										"select * from productreviews where productId='$pid'"
									);
									$num = mysqli_num_rows($rt);
									?>
									<div class="rating-reviews m-t-20">
										<div class="row">
											<div class="col-sm-3">
												<div class="rating rateit-small"></div>
											</div>
											<div class="col-sm-8">
												<div class="reviews">
													<a href="#" class="lnk">(<?php echo htmlentities($num); ?> Reviews)</a>
												</div>
											</div>
										</div><!-- /.row -->
									</div><!-- /.rating-reviews -->
									<?php
									?>
									<div class="stock-container info-container m-t-10">
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">Availability :</span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="stock-box">
													<span class="value"><?php echo htmlentities(
																			$row['productAvailability']
																		); ?></span>
												</div>
											</div>
										</div><!-- /.row -->
									</div>



									<div class="stock-container info-container m-t-10">
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">Product Brand :</span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="stock-box">
													<span class="value"><?php echo htmlentities($row['productCompany']); ?></span>
												</div>
											</div>
										</div><!-- /.row -->
									</div>


									<div class="stock-container info-container m-t-10">
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">Shipping Charge :</span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="stock-box">
													<span class="value"><?php if ($row['shippingCharge'] == 0) {
																			echo 'Free';
																		} else {
																			echo htmlentities($row['shippingCharge']);
																		} ?></span>
												</div>
											</div>
										</div><!-- /.row -->
									</div>
									<div class="price-container info-container m-t-20">
										<div class="row">
											<div class="col-sm-6">
												<div class="price-box">
													<span class="price">$ <?php echo htmlentities($row['productPrice']); ?></span>
													<span class="price-strike">$ <?php echo htmlentities(
																						$row['productPriceBeforeDiscount']
																					); ?></span>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="favorite-button m-t-10">
													<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities(
																																												$row['id']
																																											); ?>&&action=wishlist">
														<i class="fa fa-heart"></i>
													</a>

													</a>
												</div>
											</div>

										</div><!-- /.row -->
									</div><!-- /.price-container -->
									<div class="quantity-container info-container">
										<div class="row">

											<div class="col-sm-2">
												<span class="label">Qty :</span>
											</div>

											<div class="col-sm-2">
												<div class="cart-quantity">
													<div class="quant-input">
														<div class="arrows">
															<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
															<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
														</div>
														<input type="text" value="1">
													</div>
												</div>
											</div>

											<div class="col-sm-7">
												<a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
											</div>


										</div><!-- /.row -->
									</div><!-- /.quantity-container -->

									<div class="product-social-link m-t-20 text-right">
										<span class="social-label">Share :</span>
										<div class="social-icons">
											<ul class="list-inline">
												<li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
												<li><a class="fa fa-twitter" href="#"></a></li>
												<li><a class="fa fa-linkedin" href="#"></a></li>
												<li><a class="fa fa-rss" href="#"></a></li>
												<li><a class="fa fa-pinterest" href="#"></a></li>
											</ul><!-- /.social-icons -->
										</div>
									</div>




								</div><!-- /.product-info -->
							</div><!-- /.col-sm-7 -->
						</div><!-- /.row -->


					</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.product-tabs -->

	<?php
					
				}
	?>



	<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

	</div><!-- /.col -->

	</div>
	</div>
	</div>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
	<script src="assets/js/jquery.rateit.min.js"></script>
	<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>

</html>