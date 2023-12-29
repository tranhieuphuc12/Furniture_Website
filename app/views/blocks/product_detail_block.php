
	<div class="container">
		<div class="row">
			<div class="col">
				<img src=">"
					style="width: 100%; height: auto;">
			</div>
			<div class="col">
				<span class="text-secondary block">
				<?php echo $product['category_name']?>
                    </span>
				<h1>
                    <?php echo $product['name']?>
                </h1>
				<span class="text-dark fs-3 fw-bold">
				<?php echo $product['price']?>$
				</span> 
				<span class="text-secondary">& Free Shipping</span>
				<p class="text-secondary">
				<?php echo $product['description']?>
                </p>
				
				<form action="add_to_cart.php" method="get">
					<input type="hidden" name="productId" value="<?php echo $product['id']?>">
					<input type="hidden" name="quantity" value="1">
					<input type="hidden" name="price" value="<?php echo $product['price']?>">
					<button type="submit" class="shop_collections_btn btn btn-warning ms-3">Add to cart</button>
				</form>
      			<hr class="text-secondary">
			</div>
		</div>
	</div>