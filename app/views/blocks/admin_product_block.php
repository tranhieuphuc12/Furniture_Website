<div class="container-fluid mt-3 px-5">
	<!-- Switch page -->
	<div class="d-flex justify-content-center">
		<div class="management-order ">
			<a style="padding: 9px 20px; width: 100px;" href="index.php" class="btn btn-outline-warning">Orders</a>
		</div>
		<div class="management-product">
			<a style="width: 100px;" href="product_management.php" class="btn btn-warning shop_collections_btn">Products</a>
		</div>
	</div>
	<h2 class="text-center fw-bold title_h6 mb-3 mt-5">Management Products</h2>
	<!-- <button type="button" style="padding: 5px 30px; width: 100px;" class="nav-link text-dark shop_collections_btn btn btn-warning title_a " data-bs-toggle="modal" data-bs-target="#modalAddProductForm">
	<i class="bi bi-plus-lg fs-5">
	</button> -->

	<button class="btn-add" type="button" data-bs-toggle="modal" data-bs-target="#modalAddProductForm">
		<div class="sign"><i class="bi bi-plus-lg fs-5"></i></div>
		<div class="btn-add-text">Add</div>
	</button>


	<table class="mt-3 table table-sm table-hover">
		<thead>
			<tr>
				<th scope="col" style="width:40px;">
					<h5 class="text-center inline-block title_h6 text-secondary">#</h5>
				</th>
				<th scope="col" style="width:40px;">
					<h5 class="text-center inline-block title_h6 text-secondary">ID</h5>
				</th>
				<th scope="col">
					<h5 class="text-center inline-block title_h6 text-secondary">Product</h5>
				</th>
				<th scope="col">
					<h5 class="text-center inline-block title_h6 text-secondary">Quantity</h5>
				</th>
				<th scope="col" style="width:100px;">
					<h5 class="text-center inline-block title_h6 text-secondary"><i class="fs-4 bi bi-currency-dollar"></i></h5>
				</th>
				<th scope="col" style="width:300px;">
					<h5 class="text-center inline-block title_h6 text-secondary">Description</h5>
				</th>
				<th scope="col">
					<h5 class="text-center inline-block title_h6 text-secondary">Origin</h5>
				</th>
				<th scope="col">
					<h5 class="text-center inline-block title_h6 text-secondary"><i class="fs-3 bi bi-card-image"></i></h5>
				</th>
				<th scope="col">
					<h5 class="text-center inline-block title_h6 text-secondary">Category</h5>
				</th>
				<th scope="col" style="width:150px;">
					<h5 class="text-center inline-block title_h6 text-secondary">Action</h5>
				</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$i = $page * $perPage - ($perPage - 1);
			foreach ($products as $product) :
			?>
				<tr>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $i++ ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['id'] ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['name'] ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class=" text-secondary text-center">x <?php echo $product['quantity'] ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['price'] ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['description'] ?>
						</h6>
					</th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['origin'] ?>
						</h6>
					</th>
					<td><img style="width:100px;" class="thumnail" src="../asset/img/products/<?php echo $product['image'] ?>" alt="<?php echo $product['image'] ?>">
					</td>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['category_name'] ?>
						</h6>
					</th>
					<td>
					<h6 class="py-2 my-0 text-secondary text-center d-flex justify-content-center">
						<a href="product_edit.php?productId=<?php echo $product['id'] ?>&page=<?php echo $page?>" type="button" class="border border-0 bg-transparent">
							<i class="bi bi-pencil  btn btn-outline-primary"></i>
						</a>
						</h6>
						<h6 class="py-2 my-0 text-secondary text-center d-flex justify-content-center">
							<a type="button" class="mt-1" onclick="javascript:return confirm('You want to delete this product ?')" href="product_delete.php?productId=<?php echo $product['id']?>"><i class="bi bi-trash  btn btn-outline-danger"></i></a>
						</h6>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<!-- Pagination -->
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">


			<?php if ($page != 1) : ?>
				<li class="page-item">
					<a class="page-link" href="product_management.php?page=1" aria-label="First">
						<span aria-hidden="true">&laquo;&laquo;</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="product_management.php?page=<?php echo ($page - 1) ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
			<?php
			endif;
			$pages = ceil($total / $perPage);
			for ($i = 1; $i <= $pages; $i++) :
			?>
				<li class="page-item"><a <?php echo ($page == $i) ? ' style="background:#ffca2c; color: #d10000;"' : '' ?> class="page-link btn btn-outline-warning" href="product_management.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

			<?php
			endfor;
			if ($page != $pages) :
			?>
				<li class="page-item">
					<a class="page-link" href="product_management.php?page=<?php echo ($page + 1) ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="product_management.php?page=<?php echo $pages ?>" aria-label="Last">
						<span aria-hidden="true">&raquo;&raquo;</span>
					</a>
				</li>
			<?php endif ?>

		</ul>
	</nav>
	<!-- End pagination -->
</div>
<!-- Modal Add Product Form  -->
<div class="modal fade" id="modalAddProductForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add-product-title">Add new product</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="product_store.php" method="post" enctype='multipart/form-data'>
					<div class="mb-3">
						<label for="add-product-name" class="form-label">Name</label> <input type="text" class="form-control" id="add-product-name" name="name" placeholder="Product Name" required />
					</div>
					<div class="mb-3">
						<label for="price" class="form-label">Price</label> <input type="number" min="0" step="0.01" class="form-control" id="price" name="price" placeholder="Price" required />
					</div>
					<div class="mb-3">
						<label for="quantity" class="form-label">Quantity</label> <input type="number" class="form-control" id="quantity" name="quantity" min="0" placeholder="Quantity" required />
					</div>
					<div class="mb-3">
						<label for="add-product-description">Description</label>
						<textarea class="form-control" placeholder="Description" id="add-product-description" name="description" required></textarea>
					</div>
					<div class="mb-3">
						<label for="add-product-origin">Origin</label> <input class="form-control" placeholder="Origin" id="add-product-origin" name="origin" required>
					</div>
					<div class="mb-3">
						<label for="input-add-image" class="form-label">Image</label> <input class="form-control" type="file" id="input-add-image" name="image" required>

					</div>
					<div class="mb-3">

						<label for="category_choose">Category</label>
						<select id="category_choose" name="categoryId" class="form-select" aria-label="Default select example" required>
							<?php foreach ($categories as $category) : ?>
								<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button style="padding: 9px 20px; width: 100px;" type="submit" class="btn btn-warning float-end">ADD</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Edit Product Form  -->
<!-- <div class="modal fade" id="modalUpdateProductForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex justify-content-center flex-column flex-grow-1">
					<h5 class="modal-title text-center" id="edit-product-title">Edit product</h5>
    				<h6 id="edit-product-id" class="title_h6 text-center text-secondary">#</h6>
				</div>
				
				<button type="button" class="btn-close mx-0" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="product_update.php" method="post" enctype='multipart/form-data'>
					<input type="hidden" class="form-control" name="id" placeholder="id" />
					<div class="mb-3">
						<label class="form-label">Name</label> <input type="text" class="form-control" id="edit-product-name" name="name" placeholder="Product Name" required />
					</div>
					<div class="mb-3">
						<label class="form-label">Price</label> <input type="number" min="0" step="0.01" class="form-control" id="edit-product-price" name="price" placeholder="Price" required />
					</div>
					<div class="mb-3">
						<label class="form-label">Quantity</label> <input type="number" min="0" class="form-control" id="edit-product-quantity" name="quantity" placeholder="Quantity" required />
					</div>
					<div class="mb-3">
						<label for="floatingTextarea">Description</label>
						<textarea class="form-control" placeholder="Description" id="edit-product-description" name="description" required></textarea>
					</div>
					<div class="mb-3">
						<label for="floatingTextarea">Origin</label> <input class="form-control" placeholder="origin" id="edit-product-origin" name="origin" required>
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Image</label> <input class="form-control" type="file" id="edit-product-image" name="image">
						<input class="form-control" type="hidden" id="imageOld" name="imageOld">
					</div>
					<div class="mb-3">
						<label for="category_choose">Category</label>
						<select id="category_choose" name="categoryId" class="form-select" aria-label="Default select example" required>
							<?php foreach ($categories as $category) : ?>
								<option class="option-categories" value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
							<?php endforeach ?>
						</select>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button  style="padding: 9px 20px; width: 100px;" type="submit" class="btn btn-warning float-end">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->
<script>
	// function getInforProductByProductId(productId) {
	// 	//Get button
	// 	let btnEdit = document.querySelector('#btn-edit-' + productId);
	// 	// Get data
	// 	let dataId = btnEdit.getAttribute('data-bs-id');
	// 	let dataName = btnEdit.getAttribute('data-bs-name');
	// 	let dataQuantity = btnEdit.getAttribute('data-bs-quantity');
	// 	let dataPrice = btnEdit.getAttribute('data-bs-price');
	// 	let dataDescription = btnEdit.getAttribute('data-bs-description');
	// 	let dataOrigin = btnEdit.getAttribute('data-bs-origin');
	// 	let dataImage = btnEdit.getAttribute('data-bs-image');
	// 	let dataCategoryId = btnEdit.getAttribute('data-bs-categoryid');

	// 	// Get node update data
	// 	let title = document.querySelector('#edit-product-title');
	// 	let id = document.querySelector('#edit-product-id');
	// 	let name = document.querySelector('#edit-product-name');
	// 	let price = document.querySelector('#edit-product-price');
	// 	let quantity = document.querySelector('#edit-product-quantity');
	// 	let description = document.querySelector('#edit-product-description');
	// 	let origin = document.querySelector('#edit-product-origin');
	// 	let imageOld =document.querySelector('#imageOld');
		
	// 	id.textContent = '#' +dataId;
	// 	name.setAttribute('value', dataName);
	// 	price.setAttribute('value', dataPrice);
	// 	quantity.setAttribute('value', dataQuantity);
	// 	description.textContent = dataDescription;
	// 	origin.setAttribute('value', dataOrigin);
	// 	imageOld.setAttribute('value', dataImage);

	// 	let optionCategories = document.querySelectorAll('.option-categories');
	// 	optionCategories.forEach(element => {
	// 		if (element.getAttribute('value') == dataCategoryId) {
	// 			element.setAttribute('selected', 'selected');
	// 		}
	// 	});

	// }
</script>