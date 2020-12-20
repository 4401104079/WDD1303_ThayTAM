<?php
	include('db_connect.php');
	
	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
	}
	
	$sql = "SELECT * FROM products WHERE product_id=$id";
	
	$result = mysqli_query($conn, $sql);
	
	$products = mysqli_fetch_assoc($result);
	
	$sql = "SELECT * FROM products WHERE new='1'";
	
	$result1 = mysqli_query($conn, $sql);
	
	$new_products = mysqli_fetch_all($result1, MYSQLI_ASSOC);
	
	mysqli_free_result($result);
	mysqli_free_result($result1);
	
	mysqli_close($conn);
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BetaDesign &mdash; Product</title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
</head>
<style>
.productimg img{width:  250px; height: 250px; margin-top:30px; margin-left: 30px}
.media img{width:  80px; height: 80px;}
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

		<div class="inner-header">
			<div class="container">
				<div class="pull-left">
					<h6 class="inner-title">Sản phẩm</h6>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="container">
			<div id="content">
				<div class="row">
					<div class="col-sm-9">

						<div class="row">
							<div class="productimg col-sm-4">
								<img src="image/product/<?php  echo htmlspecialchars($products['image']); ?>" alt="">
							</div>
							<div class="col-sm-8">
								<div class="single-item-body" style="margin-top:30px;margin-left: 20px">
									<p class="single-item-title" ><?php  echo htmlspecialchars($products['product_name']); ?></p>
									<p class="single-item-price">
										<span><?php  echo htmlspecialchars($products['unit_price']); ?> vnđ</span>
									</p>
								</div>

								<div class="clearfix"></div>
								<div class="space20">&nbsp;</div>

								<div class="single-item-desc">
									<p>Thông tin: <?php  echo htmlspecialchars($products['description']); ?></p>
								</div>
								<div class="space20">&nbsp;</div>

								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>

						<div class="space40">&nbsp;</div>
						
						
					</div>
					<div class="col-sm-3 aside">
						<div class="widget">
							<h3 class="widget-title" style="color:black">Sản phẩm mới</h3>
							<div class="widget-body">
								<div class="beta-sales beta-lists">
									<?php
										$count = 0;
										foreach($new_products as $new_product) {
										$count++;
										if($count > 4) break;
									?>
									<div class="media beta-sales-item">
										<a class="pull-left" href="product.php?id=<?php echo $new_product['product_id']; ?>"><img src="image/product/<?php echo htmlspecialchars($new_product['image']); ?>" alt=""></a>
										<div class="media-body">
											<?php echo htmlspecialchars($new_product['product_name']); ?> <br>
											<span class="beta-sales-price"><?php echo htmlspecialchars($new_product['unit_price']) . ' Đồng'; ?></span>
										</div>
									</div>
									
									<?php } ?>
									
								</div>
							</div>
						</div> <!-- best sellers widget -->
						
					</div>
				</div>
			</div> <!-- #content -->
		</div> <!-- .container -->
	</div>
	<div id="footer">
		<div class="container">
		
				<div class="col-sm-3">
					<a href="index.php" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="blog_fullwidth_3col.html"><i class="fa fa-chevron-right"></i> Web Design</a></li>
								<li><a href="blog_fullwidth_3col.html"><i class="fa fa-chevron-right"></i> Web development</a></li>
								<li><a href="blog_fullwidth_3col.html"><i class="fa fa-chevron-right"></i> Marketing</a></li>
								<li><a href="blog_fullwidth_3col.html"><i class="fa fa-chevron-right"></i> Tips</a></li>
								<li><a href="blog_fullwidth_3col.html"><i class="fa fa-chevron-right"></i> Resources</a></li>
								<li><a href="blog_fullwidth_3col.html"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
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
									<p>30 South Park Avenue San Francisco, CA 94108 Phone: +78 123 456 78</p>
									<p>Nemo enim ipsam voluptatem quia voluptas sit asnatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.</p>
								</div>
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

	<!--customjs-->
	<script type="text/javascript">
		$(function () {
			// this will get the full URL at the address bar
			var url = window.location.href;

			// passes on every "a" tag
			$(".main-menu a").each(function () {
				// checks if its the same on the address bar
				if (url == (this.href)) {
					$(this).closest("li").addClass("active");
					$(this).parents('li').addClass('parent-active');
				}
			});
		});


	</script>
	<script>
		jQuery(document).ready(function ($) {
			'use strict';

			// color box

			//color
			jQuery('#style-selector').animate({
				left: '-213px'
			});

			jQuery('#style-selector a.close').click(function (e) {
				e.preventDefault();
				var div = jQuery('#style-selector');
				if (div.css('left') === '-213px') {
					jQuery('#style-selector').animate({
						left: '0'
					});
					jQuery(this).removeClass('icon-angle-left');
					jQuery(this).addClass('icon-angle-right');
				} else {
					jQuery('#style-selector').animate({
						left: '-213px'
					});
					jQuery(this).removeClass('icon-angle-right');
					jQuery(this).addClass('icon-angle-left');
				}
			});
		});
	</script>
	<script  type="text/javascript" >
		var products = [<?php echo json_encode($products); ?>]
		let carts = document.querySelectorAll('.add-to-cart');


		for (let i=0; i < carts.length; i++){
				carts[i].addEventListener('click',() => {
						cartNumbers(products[i]);
						totalCost(products[i]);
						displayCart();
				})
		}

		function onLoadCartNumbers(){
			let productNumbers = localStorage.getItem('cartNumbers');
			if(productNumbers) {
				document.querySelector('.cart span').textContent =  productNumbers;	
			}
		}

		function cartNumbers(product){
			let productNumbers = localStorage.getItem('cartNumbers');
			
			productNumbers = parseInt(productNumbers);
			
			if( productNumbers) {
			localStorage.setItem('cartNumbers', productNumbers + 1);
			document.querySelector('.cart span').textContent =  productNumbers + 1;
			} else {
			localStorage.setItem('cartNumbers', 1);
			document.querySelector('.cart span').textContent =  1;
			}
			
			setItems(product)
		}
		
		function setItems(product){
			let cartItems = localStorage.getItem('productsInCart');
			cartItems = JSON.parse(cartItems);
			
			if(cartItems != null){
				product.inCart = 0;
				if(cartItems[product.product_id] == undefined) {
					cartItems = {
						...cartItems,
						[product.product_id]: product
					}
				}
				
				cartItems[product.product_id].inCart += 1
			} else {
				product.inCart = 1;
				cartItems ={
					[product.product_id]: product
				}
			}
			
			localStorage.setItem("productsInCart", JSON.stringify(cartItems));
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
