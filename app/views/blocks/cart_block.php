<div class="container mt-3">
	<h2 class="fw-bold title_h6">Cart</h2>
	<div class="row">
		<div class="">
			<table class="table table-sm table-hover">
				<thead>
					<tr>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary">#</h5>
						</th>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary">Product</h5>
						</th>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary">Image</h5>
						</th>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary">Price</h5>
						</th>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary ">Quantity</h5>
						</th>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary">Total</h5>
						</th>
						<th scope="col">
							<h5 class="inline-block title_h6 text-secondary">
								<i class="bi bi-trash3"></i>
							</h5>
						</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$i = 1;
					$totalCoG = 0;
					foreach ($products as $product) {
						$totalCoG += ($product['quantity'] * $product['price'])
							?>
						<tr>
							<td>
								<?php echo $i++ ?>
							</td>
							<td>
								<?php echo $product['name'] ?>
							</td>
							<td>
								<img src="./public/img/products/<?php echo $product['image'] ?>" alt="<?php echo $product['image'] ?>"
									width="100px">

							</td>
							<td>
								<?php echo $product['price'] ?>
							</td>
							<td>
								<!-- Neu so luong san pham trong cart < 0 thi an nut sub -->
								<?php
								if ($product['quantity'] > 1) {
									?>
									<a href="sub_at_cart.php?productId=<?php echo $product['id'] ?>&quantity=1"><i
											class="bi bi-patch-minus"></i></a>
									<?php
								} else {
									?>
									<i class="bi bi-patch-minus"></i>
									<?php
								}
								?>


								<?php echo $product['quantity'] ?>
								<!-- Neu so luong cua san pham  < 0 thi an nut add -->
								<?php
								if ($product['quantityProduct'] > 0) {
									?>
									<a href="add_at_cart.php?productId=<?php echo $product['id'] ?>&quantity=1"><i
											class="bi bi-patch-plus"></i></a>
									<?php
								} else {
									?>
									<i class="bi bi-patch-plus"></i>
									<?php
								}
								?>
							</td>
							<td>
								<?php echo $product['quantity'] * $product['price'] ?>
							</td>
							<td><a
									href="destroy_product_cart.php?productId=<?php echo $product['id'] ?>&quantity=<?php echo $product['quantity'] ?>"><i
										class="bi bi-trash  btn btn-outline-danger"></i>
								</a></td>
						</tr>

						<?php
					}

					?>
				</tbody>
			</table>
		</div>
		<div class="col-sm-4 mt-5 mb-5"></div>
		<div class="col-sm-4 mt-5 mb-5 ">
			<h1 class="text-center text-danger">Cart Totals</h1>
			<table class=" table table-hover w-100">
				<tr class="row ">
					<td class="col-sm-6 fw-bold">Total cost of goods</td>
					<td class="col-sm-6">
						<?php echo $totalCoG ?>$
					</td>
				</tr>
				<tr class="row">
					<td class="col-sm-6 fw-bold">Discount</td>
					<td class="col-sm-6">
						<?php
						$percentByAccount = 0;
						$percentByTotal = 0;
						$percent = 0;
						$discountModel = new Discount();
						if ($account[0]['accumulation'] >= 10000) {
							$percentByAccount = $discountModel->getPercentDiscountsASC()[0]['percentage'];
						}
						if (isset($_SESSION['cart_id'])) {
							if ($discountModel->getPercentDiscountsByTotalDESC($totalCoG) != null) {
								$percentByTotal = $discountModel->getPercentDiscountsByTotalDESC($totalCoG)[0]['percentage'];
							}
						}
						$percent = (($percentByAccount > $percentByTotal) ? $percentByAccount : $percentByTotal);
						$discount = $totalCoG * $percent / 100;
						print($discount . '$ (' . ($percent) . '%)');
						?>
					</td>
				</tr>
				<tr class="row">
					<td class="col-6 fw-bold">Total bill</td>
					<td class="col-6">
						<?php
						if (isset($_SESSION['cart_id'])) {
							print($totalCoG - $discount);
						} else {
							print(0);
						}
						?>$
					</td>
				</tr>

			</table>
			<div class="d-flex">
				<a <?php
				if (isset($_SESSION['cart_id'])) { ?> href="order_buy.php" <?php } ?>
					class="btn btn-warning mx-auto">
					Order now
				</a>
			</div>
		</div>
		<div class="col-sm-4 mt-5 mb-5"></div>
	</div>
</div>