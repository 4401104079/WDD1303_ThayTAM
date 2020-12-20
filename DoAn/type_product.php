<?php
	include('db_connect.php');
	
	if(isset($_GET['id'])){
		$id_type = mysqli_real_escape_string($conn, $_GET['id']);
	}
	
	$sql = "SELECT * FROM products WHERE id_type=$id_type";
	
	$result = mysqli_query($conn, $sql);
	
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	$sql = "SELECT type_name FROM type_products WHERE id=$id_type";
	
	$result1 = mysqli_query($conn, $sql);
	
	$type_products = mysqli_fetch_assoc($result1);
	
	mysqli_free_result($result);
	mysqli_free_result($result1);
	
	mysqli_close($conn);
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Products </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
	
</head>
<style>
.single-item-header img {width:  250px; height: 250px;}
.cart img{width:  50px; height: 50px;}
</style>
<body>
	<!-- TUYẾT RƠI -->
	<div class="snowflakes" aria-hidden="true">
		<div class="snowflake">
			❅
		</div>
		<div class="snowflake">
			❆
		</div>
		<div class="snowflake">
			❅
		</div>
		<div class="snowflake">
			❆
		</div>
		<div class="snowflake">
			❅
		</div>
		<div class="snowflake">
			❆
		</div>
		<div class="snowflake">
			❅
		</div>
		<div class="snowflake">
			❆
		</div>
		<div class="snowflake">
			❅
		</div>
		<div class="snowflake">
			❆
		</div>
		<div class="snowflake">
			❅
		</div>
		<div class="snowflake">
			❆
		</div>
	</div>

	<div class="bgc">
		<div id="header">
			<div class="header-body">
				<div class="container beta-relative">
					<div class="pull-left">
						<a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
					</div>
					
					<div class="clearfix"></div>
				</div> <!-- .container -->
			</div> <!-- .header-body -->

			<div class="header-bottom">
				<div class="container">
					<div class="pull-left auto-width-left">
						<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
						<div class="visible-xs clearfix"></div>
						<nav class="main-menu">
							<ul class="l-inline ov">
								<li><a href="index.php"><b>Trang chủ</b></a></li>
								<li>
									<a href="#"><b>Bánh</b></a>
									<ul class="sub-menu">
										<li><a href="type_product.php?id=1">Bánh mặn</a></li>
										<li><a href="type_product.php?id=2">Bánh ngọt</a></li>
										<li><a href="type_product.php?id=3">Bánh trái cây</a></li>
										<li><a href="type_product.php?id=4">Bánh kem</a></li>
										<li><a href="type_product.php?id=5">Bánh crepe</a></li>
									</ul>
								</li>
								<li><a href="type_product.php?id=6"><b>Thức uống</b></a></li>
								<li>
									<a href="#"><b>Khác</b></a>
									<ul class="sub-menu">
										<li><a href="type_product.php?id=7">Kẹo</a></li>
										<li><a href="type_product.php?id=8">Snack</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
					<div class="pull-right beta-components space-left ov">
						<div class="space10">&nbsp;</div>
						<div class="beta-comp">
						<div class="beta-comp">
							<div class="cart" style="background-color : white">
								<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<span>0</span>) <i class="fa fa-chevron-down"></i></div>
								<div class="beta-dropdown cart-body">
									
									
									<div class="cart-item">
										<div class="media">
											<a class="pull-left" ></a>
											<div class="media-body">
												<span class="cart-item-title"></span>
												<span class="cart-item-amount"></span>
											</div>
										</div>
									</div>
									

									<div class="cart-caption">
										<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"> 0 vnđ</span></div>
										<div class="clearfix"></div>

										<div class="center">
											<div class="space10">&nbsp;</div>
											<a href="shopping_cart.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
										</div>
									</div>
								</div>
							</div> <!-- .cart -->
						</div>
					</div>
				</div> <!-- .container -->
			</div> <!-- .header-bottom -->
		</div> <!-- #header -->
		<?php if($type_products): ?>
			<div class="inner-header">
				<div class="container">
					<div class="pull-left">
						<h6 class="inner-title" style="color:snow;"><?php  echo htmlspecialchars($type_products['type_name']); ?></h6>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="container">
				<div id="content" class="space-top-none">
					<div class="main-content">
						<div class="space60">&nbsp;</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="beta-products-list">
									<div class="beta-products-details">
										<div class="clearfix"></div>
									</div>

							
										<?php
											foreach($products as $product) {
										?>
										<div class="col-sm-3">
											<div class="single-item">
												<div class="single-item-header">
													<a href="#!"><img src="image/product/<?php echo htmlspecialchars($product['image']); ?>" alt=""></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title"><?php echo htmlspecialchars($product['product_name']); ?></p>
	
													<p class="single-item-price pull-left">
														<span><?php echo htmlspecialchars($product['unit_price']) . ' vnđ'; ?></span>
													</p>
													<a class="beta-btn primary" href="product.php?id=<?php echo $product['product_id']; ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
				
												</div>
												<div class="single-item-caption">
													
												</div>
												</div>
										</div>
										<?php } ?>
										
									</div>
								</div> <!-- .beta-products-list -->

								<div class="space50">&nbsp;</div>


							</div>
						</div> <!-- end section with sidebar and main content -->
						
					</div> <!-- .main-content -->
				</div> <!-- #content -->
			</div> <!-- .container -->
		<?php else: include('404.html') ?>
		<?php endif ?>
		
		<!--MODAL---->
		
		<div class="modal fade" id="product">
			<div class="modal-dialog centered">
				<div class="modal-content">
					<div class="modal-body">
						
					</div><!--- end modal-body ---->
				</div><!--- end modal-content ---->
			</div><!--- end modal-dialog ---->
		</div><!--- end modal ---->
		
	</div>
	<div id="footer" class="color-div">
		<div class="container">
				<div class="col-sm-3">
					<a href="index.php" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web Design</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web development</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Marketing</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Tips</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Resources</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-10">
						<div class="widget">
							<h4 class="widget-title">Contact Us</h4>
							<div>
								<div class="contact-info">
									<i class="fa fa-map-marker"></i>
									<p>280 An Dương Vương, Quận 5 Thành phố Hồ Chí Minh, Việt Nam Phone: +78 123 456 78</p>

							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						
					</div>
				</div>
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
			<p class="policy"> Privacy policy. (&copy;) 2020</p>
	</div> <!-- .copyright -->
	<!-- include js files -->
	<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/dest/js/waypoints.min.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	<script>
		$(document).ready(function ($) {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 150) {
					$(".header-bottom").addClass('fixNav')
				} else {
					$(".header-bottom").removeClass('fixNav')
				}
			}
			)
		})
	</script>
	<script>
		/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function () {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>
	<script  type="text/javascript" >
		
		


		function onLoadCartNumbers(){
			let productNumbers = localStorage.getItem('cartNumbers');
			if(productNumbers) {
				document.querySelector('.cart span').textContent =  productNumbers;	
			}
		}

		

		function totalCost(product){
			let cartCost = localStorage.getItem('totalCost');
			
			if(cartCost !=null){
				cartCost = Number(cartCost);
				localStorage.setItem("totalCost", cartCost + Number(product.unit_price));
			} else {	
			localStorage.setItem("totalCost", product.unit_price);
			}
		}
		
		function displayCart(){
			let cartItems = localStorage.getItem("productsInCart");
			cartItems = JSON.parse(cartItems);
			let productContainer = document.querySelector(".cart-item")
			let productContainer1 = document.querySelector(".cart-caption")
			let cartCost = localStorage.getItem('totalCost');
			
			if (cartItems && productContainer) {
				console.log("running");
				productContainer.innerHTML = '';
				productContainer1.innerHTML = '';
				Object.values(cartItems).map(item => {
				productContainer.innerHTML +=`
					<div class="media">
						<a class="pull-left" ><img src="image/product/${item.image}" alt=""></a>
						<div class="media-body">
							<span class="cart-item-title">${item.product_name}</span>
						<span class="cart-item-amount">${item.inCart}*${item.unit_price} vnđ</span>
							</div>
					</div>
				`
				});
				productContainer1.innerHTML +=`
					<div class="cart-caption">
						<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"> ${cartCost} vnđ</span></div>
						<div class="clearfix"></div>

						<div class="center">
							<div class="space10">&nbsp;</div>
							<a href="shopping_cart.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				`
				
				
			}
		}
		
		onLoadCartNumbers();
		displayCart();

	</script>
</body>
</html>
