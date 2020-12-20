
		
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
				
				if(cartItems[product.id] == undefined) {
					cartItems = {
						...cartItems,
						[product.id]: product
					}
				}
				
				cartItems[product.id].inCart += 1
			} else {
				product.inCart = 1;
				cartItems ={
					[product.id]: product
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
								<span class="cart-item-title">${item.name}</span>
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
							<a href="shopping_cart.php" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				`
				
				
			}
		}
		
		onLoadCartNumbers();
		displayCart();

