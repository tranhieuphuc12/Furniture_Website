<div class="container mt-3">
	<!-- Switch page -->
<div class="d-flex justify-content-center align-item-center">
	<div class="management-order ">
		<a style="width: 100px;"href="index.php" class="btn btn-warning shop_collections_btn">Orders</a>
	</div>
	<div class="management-product">
		<a style="padding: 9px 20px; width: 100px;"href="product_management.php" class="btn btn-outline-warning">Products</a>
	</div>
</div>
	<h2 class="fw-bold title_h6 text-center my-5">Orders</h2>


	<table class="table table-sm table-hover">
		<thead>
			<tr>
				<th scope="col">
					<h5 class="inline-block text-secondary text-center">#</h5>
				</th>
				<th scope="col">
					<h5 class="inline-block title_h6 text-secondary text-center">ID</h5>
				</th>
				<th scope="col">
					<h5 class="inline-block title_h6 text-secondary text-center">Customer</h5>
				</th>
				<th scope="col">
					<h5 class="inline-block title_h6 text-secondary text-center">Phone</h5>
				</th>
				<th scope="col">
					<h5 class="inline-block title_h6 text-secondary text-center">Status</h5>
				</th>
				<th scope="col">
					<h5 class="inline-block title_h6 text-secondary text-center">Action</h5>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($orders as $order) : ?>
				<tr>
					<th scope="row">
						<h6 class="py-2 mt-2 text-secondary text-center"><?php echo $i++ ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class="py-2 mt-2 text-secondary text-center"><?php echo $order['order_id'] ?>
						</h6>
					</th>

					<td>
						<h6 class=" py-2 mt-2 text-secondary text-center">
							<?php echo $order['username'] ?>
						</h6>
					</td>
					<td>
						<h6 class=" py-2 mt-2 text-secondary text-center">
							<?php echo $order['phone_number'] ?>
						</h6>
					</td>
					<td>
						<h6 class="py-2 mt-2 <?php echo ($order['status'] == 1) ? 'text-danger' : 'text-secondary'; ?> text-center">
							<?php echo $order['status_name'] ?>
						</h6>
					</td>

					<td>
						<h6 class="py-2 my-0 text-secondary text-center d-flex justify-content-center">
							<a href="show_products_order.php?orderId=<?php echo $order['order_id']?>&username=<?php echo $order['username']?>&status=<?php echo $order['id']?>" class="btn-view px-2 py-2 nav-link text-dark shop_collections_btn btn btn-warning title_a">
								<i class="bi bi-card-list"></i> View
							</a>
						</h6>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>


<!-- Modal Add Product Form  -->
<div class="modal fade" id="modalAddProductForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="CreateProductServlet" method="post" enctype='multipart/form-data'>
					<div class="mb-3">
						<label class="form-label">Name</label> <input type="text" class="form-control " id="name" name="name" placeholder="Product Name" />
					</div>
					<div class="mb-3">
						<label class="form-label">Price</label> <input type="text" class="form-control" id="price" name="price" placeholder="Price" />
					</div>
					<div class="mb-3">
						<label for="floatingTextarea">Description</label>
						<textarea class="form-control" placeholder="Description" id="description" name="description"></textarea>
					</div>
					<div class="mb-3">
						<label for="floatingTextarea">Origin</label> <input class="form-control" placeholder="origin" id="origin" name="origin">
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Image</label> <input class="form-control" type="file" id="image" name="image">
					</div>
					<div class="mb-3">

						<label for="category_choose">Category</label> <select name="category_choose" class="form-select" aria-label="Default select example">

							<!-- <%
								for (int i = 0; i < categories.size(); i++) {
								%> -->
							<option value="<%=categories.get(i).getId()%>">
								<!-- <%=categories.get(i).getName()%> -->
							</option>
							<!-- <%
								}
								%> -->
						</select>

					</div>
					<div class="modal-footer d-block">

						<button type="submit" class="btn btn-warning float-end">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Edit Product Form  -->
<div class="modal fade" id="modalUpdateProductForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="UpdateProductServlet" method="post" enctype='multipart/form-data'>
					<input type="hidden" class="form-control" id="id" name="id" placeholder="id" />
					<div class="mb-3">
						<label class="form-label">Name</label> <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" />
					</div>
					<div class="mb-3">
						<label class="form-label">Price</label> <input type="text" class="form-control" id="price" name="price" placeholder="Price" />
					</div>
					<div class="mb-3">
						<label for="floatingTextarea">Description</label>
						<textarea class="form-control" placeholder="Description" id="description" name="description"></textarea>
					</div>
					<div class="mb-3">
						<label for="floatingTextarea">Origin</label> <input class="form-control" placeholder="origin" id="origin" name="origin">
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Image</label> <input class="form-control" type="file" id="image" name="image">
					</div>
					<div class="mb-3">

						<label for="category_choose">Category</label> <select id="category_choose" name="category_choose" class="form-select" aria-label="Default select example">
							<!-- 
								<%
								for (int i = 0; i < categories.size(); i++) {
								%> -->
							<option value="<%=categories.get(i).getId()%>">
								<!-- <%=categories.get(i).getName()%> -->
							</option>
							<!-- <%
								}
								%> -->
						</select>

					</div>
					<div class="modal-footer d-block">
						<button type="submit" class="btn btn-warning float-end">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- <script>
const formTableBody = document.querySelector('.form-table-body');
console.log(formTableBody)
const btnAll = document.querySelectorAll('.btn-view');
btnAll.forEach(element => {
    element.addEventListener('click', function() {
		$.ajax({
            url: "show_products_order.php",
            type: "POST",
            data: {
                orderId: element.value
            },
            success: function(data) {
				console.log(data);
                data.forEach(element => {
					var html = '<tr><td>'+ element.product_id +'</td><td>'+element.name+'</td><td><img src="data:image/jpeg;base64,'+element.image+'"></td><td>x'+element.quantity+'</td><td>'+element.price+'</td><td>'+(element.quantity*element.price)+'</td></tr>';
					formTableBody.insertAdjacentHTML('afterbegin', html);
					console.log(2);
				});
            },
            error: function(xhr) {
				// console.log(xhr);
				console.log(3);
            }
    });

    })
});

</script> -->