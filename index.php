<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['cid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">
	<title>Shopping Page</title>
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="assets/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/rateit.css">
	<link rel="stylesheet" href="assets/css/config.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

</head>

<body class="cnt-home">
	<header class="header-style-1">
		<?php include('includes/menu-bar.php'); ?>
	</header>
	<section class="hero">
		<div class="container">
		<div class="hero-text">
			<h1>Dawing Room</h1>
			<h2>Inonter</h2>
			<h1 class="number">70% </h1>
			<button class="bton">SHOP NOW</button>

		</div>
		</div>
	</section>
	</div>
	
	

	</section>
	<!-- /.breadcrumb -->
	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row top_text'>

			<div class='col-12'>
				<h2>Our Products</h2>
			</div>

			</div>
			<div class='row outer-bottom-sm'>
				<div class='col-md-12'>
					<div class="search-result-container">
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active " id="grid-container">
								<div class="category-product  inner-top-vs">
									<div class="row">
										<?php
										$ret = mysqli_query($con, "select * from products");
										$num = mysqli_num_rows($ret);
										if ($num > 0) {
											while ($row = mysqli_fetch_array($ret)) { ?>
												<div class="col-sm-4  wow fadeInUp">
													<div class="products">
														<div class="product">
															<div class="product-image">
																<div class="image">
																	<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="" width="200" height="300"></a>
																</div><!-- /.image -->
															</div><!-- /.product-image -->
															<div class="add-main">
															<div class="product-info text-left">
																<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
																<div class="rating rateit-small"></div>
																<div class="description"></div>
																<div class="product-price">
																	<span class="price">
																		$ <?php echo htmlentities($row['productPrice']); ?> </span>
																	<span class="price-before-discount">$ <?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
																</div><!-- /.product-price -->
															</div><!-- /.product-info -->
															<div class="cart clearfix animate-effect">
																<div class="action">
																	<ul class="list-unstyled">
																		<li class="add-cart-button btn-group">
																			<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																				<i class="fa fa-shopping-cart"></i>
																			</button>
																			<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
																				<button class="btn btn-primary" type="button">Add to cart</button></a>
																		</li>
																		<li class="lnk wishlist">
																			<a class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist" title="Wishlist">
																				<i class="icon fa fa-heart"></i>
																			</a>
																		</li>

																	</ul>
																</div><!-- /.action -->
															</div></div><!-- /.cart -->
														</div>
													</div>
												</div>
											<?php }
										} else { ?>
											<div class="col-sm-4 wow fadeInUp">
												<h3>No Product Found</h3>
											</div>

										<?php } ?>

									</div><!-- /.row -->
								</div><!-- /.category-product -->
							</div><!-- /.tab-pane -->
						</div><!-- /.search-result-container -->

					</div><!-- /.col -->
				</div>
			</div>
			<?php include('includes/brands-slider.php'); ?>

		</div>
	</div>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/jquery.rateit.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>

</html>