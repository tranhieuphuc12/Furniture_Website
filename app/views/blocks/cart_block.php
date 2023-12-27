<div class="container mt-3">
		<h2 class="fw-bold title_h6">Cart</h2>
		<div class="row">
			<div class="">
				<table class="table table-sm table-hover">
					<thead>
						<tr>
						<th scope="col"><h5
									class="inline-block title_h6 text-secondary">#</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Product</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Image</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Price</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary ">Quantity</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Total</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">
									<i class="bi bi-trash3"></i>
								</h5></th>
						</tr>
					</thead>
					<tbody>

						<?php
							$i = 1;
							foreach ( $products as $product) { 
							?>
							<tr>
								<td>
									<?php echo $i++?>
								</td>
								<td>
									<?php echo $product['name']?>
								</td>
								<td>
									<img src="data:image/jpeg;base64, <?php echo base64_encode($product['image'])?>" alt="" width="100px">
									
								</td>
								<td>
									<?php echo $product['price']?>
								</td>
								<td>
									x<?php echo $product['quantity']?>
								</td>
								<td>
									<?php echo $product['quantity']*$product['price']?>
								</td>
							</tr>

						<?php
							}

						?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4 mt-5">
				<h1 class="text-center text-danger">Cart Totals</h1>
				<table class="table-hover w-100">
					<tr class="row " >
						<td class="col-sm-6 fw-bold">Total cost of goods</td>
						<td class="col-sm-6">A</td>
					</tr>
					<tr class="row">
						<td class="col-sm-6 fw-bold">Discount</td>
						<td  class="col-sm-6">a</td>
					</tr>
					<tr class="row">
						<td class="col-6 fw-bold">Total bill</td>
						<td class="col-6">a</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>