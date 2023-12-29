<div class="container">
	<div class="row">
		<div class="col">
			<img src="../asset/img/products/<?php echo $product['image'] ?>" style="width: 100%;">
		</div>
		<div class="col">
			<span class="text-secondary block">
				<?php echo $product['category_name'] ?>
			</span>
			<h1>
				<?php echo $product['name'] ?>
			</h1>
			<span class="text-dark fs-3 fw-bold">
				<?php echo $product['price'] ?>$
			</span>
			<span class="text-secondary">& Free Shipping</span>
			<p class="text-secondary">
				<?php echo $product['description'] ?>
			</p>

			<form action="add_to_cart.php" method="get">
				<input type="hidden" name="productId" value="<?php echo $product['id'] ?>">
				<input type="hidden" name="quantity" value="1">
				<input type="hidden" name="price" value="<?php echo $product['price'] ?>">
				<button type="submit" class="shop_collections_btn btn btn-warning ms-3 d-inline-block ">Add to cart</button>

				<div class="col d-inline-block" style="margin-left: 40px;">
                                <a onclick="<?php echo (isset($_SESSION['username'])) ? '' : 'return confirm(\'You need sign up before shopping.\')' ?>" href="<?php echo (isset($_SESSION['username'])) ? 'favorite_product.php?productId=' . $product['id'] : '#' ?>">

                                    <i class="bi fs-3 <?php if (in_array($product['id'], $productsFav)) {
                                                            print('bi-heart-fill text-danger');
                                                        } else {
                                                            print('bi-heart');
                                                        }

                                                        ?>
                                "></i></a>
                            </div>
			</form>

			
			<hr class="text-secondary">
		</div>
	</div>
</div>