<!-- Switch page -->
<div>
	<div class="management-order ">
		<a href="index.php" class="btn btn-outline-warning">Orders</a>
	</div>
	<div class="management-product">
		<a href="product_management.php" class="btn btn-warning shop_collections_btn" >Products</a>
	</div>
</div>
	<div class="container mt-3">
		<h2 class="fw-bold title_h6">Management Products</h2>
		<button type="button"
			class="nav-link text-dark shop_collections_btn btn btn-warning title_a"
			data-bs-toggle="modal" data-bs-target="#modalAddProductForm">
			<i class="bi bi-plus-lg"></i>Product
		</button>


		<table class="table table-sm table-hover">
			<thead>
				<tr>
				<th scope="col"><h5
							class="inline-block title_h6 text-secondary">#</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">ID</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Product</h5></th>
							<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Quantity</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Price</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Description</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Origin</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Image</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Category</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Edit</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">
							<i class="bi bi-trash3"></i>
						</h5></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				foreach ($products as $product) :
				?>
				<tr>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $i++?>
						</h6></th>
						<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['id']?>
						</h6></th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['name']?>
						</h6></th>
					<th scope="row">
						<h6 class=" text-secondary text-center">x <?php echo $product['quantity']?>
						</h6></th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['price']?>
						</h6></th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['description']?>
						</h6></th>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['origin']?>
						</h6></th>
					<td><img style="width:100px;" class="thumnail"
						src="data:image/jpg;base64,<?php echo base64_encode($product['image'])?>">
						</td>
					<th scope="row">
						<h6 class=" text-secondary text-center"> <?php echo $product['category_id']?>
						</h6></th>
					<td><button id="update_button" type="button"
							data-bs-toggle="modal" data-bs-target="#modalUpdateProductForm"
							data-bs-id="<?php echo $product['id']?>"
							data-bs-name="<?php echo $product['name']?>"
							data-bs-quantity="<?php echo $product['quantity']?>"
							data-bs-price="<?php echo $product['price']?>"
							data-bs-description="<?php echo $product['description']?>"
							data-bs-origin="<?php echo $product['origin']?>"
							data-bs-categoryId="<?php echo $product['category_id']?>"
							class="border border-0 bg-transparent">

							<i class="bi bi-exposure"></i>
						</button></td>
					<td><h6 class="py-2 my-0 text-secondary text-center d-flex justify-content-center">
						<a type="button" class="mt-1" onclick="javascript:return confirm('You want to delete this product ?')"
						href=""><i class="bi bi-x-circle text-danger"></i></a></h6></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<!-- Modal Add Product Form  -->
	<div class="modal fade" id="modalAddProductForm" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add-product-title">Add new product</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="product_store.php" method="post"
						enctype='multipart/form-data'>
						<div class="mb-3">
							<label class="form-label">ID</label> <input type="text"
								class="form-control" id="add-product-id" name="id"
								placeholder="Product ID" />
						</div>
						<div class="mb-3">
							<label class="form-label">Name</label> <input type="text"
								class="form-control" id="add-product- name" name="name"
								placeholder="Product Name" />
						</div>
						<div class="mb-3">
							<label class="form-label">Price</label> <input type="text"
								class="form-control" id="price" name="price" placeholder="Price" />
						</div><div class="mb-3">
							<label class="form-label">Quantity</label> <input type="text"
								class="form-control" id="add-product-quantity" name="quantity" placeholder="Quantity" />
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Description</label>
							<textarea class="form-control" placeholder="Description"
								id="add-product-description" name="description"></textarea>
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Origin</label> <input
								class="form-control" placeholder="Origin" id="add-product-origin"
								name="origin">
						</div>
						<div class="mb-3">
							<label for="formFile" class="form-label">Image</label> <input
								class="form-control" type="file" id="add-product-image" name="image">
						</div>
						<div class="mb-3">

						<label for="category_choose">Category</label> 
							<select
								id="category_choose" name="categoryId" class="form-select"
								aria-label="Default select example">
								<?php foreach ($categories as $category) : ?>
									<option value="<?php echo $category['name']?>"><?php echo $category['name']?></option>
								<?php endforeach ?>
							</select>

						</div>
						<div class="modal-footer d-block">

							<button type="submit" class="btn btn-warning float-end">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Edit Product Form  -->
	<div class="modal fade" id="modalUpdateProductForm" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edit-product-title">Product Detail</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="product_update.php" method="post"
						enctype='multipart/form-data'>
						<input type="hidden" class="form-control" id="edit-product-id" name="id"
							placeholder="id" />
						<div class="mb-3">
							<label class="form-label">Name</label> <input type="text"
								class="form-control" id="edit-product-name" name="name"
								placeholder="Product Name" />
						</div>
						<div class="mb-3">
							<label class="form-label">Price</label> <input type="text"
								class="form-control" id="edit-product-price" name="price" placeholder="Price" />
						</div>
						<div class="mb-3">
							<label class="form-label">Quantity</label> <input type="text"
								class="form-control" id="edit-product-quantity" name="quantity" placeholder="Quantity" />
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Description</label>
							<textarea class="form-control" placeholder="Description"
								id="edit-product-description" name="description"></textarea>
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Origin</label> <input
								class="form-control" placeholder="origin" id="edit-product-origin"
								name="origin">
						</div>
						<div class="mb-3">
							<label for="formFile" class="form-label">Image</label> <input
								class="form-control" type="file" id="edit-product-image" name="image">
							<img id="image-recent" src="">
						</div>
						<div class="mb-3">
							<label for="category_choose">Category</label> 
							<select
								id="category_choose" name="categoryId" class="form-select"
								aria-label="Default select example">
								<?php foreach ($categories as $category) : ?>
									<option value="<?php echo $category['name']?>"><?php echo $category['name']?></option>
								<?php endforeach ?>
							</select>

						</div>
						<div class="modal-footer d-block">
							<button type="submit" class="btn btn-warning float-end">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
const modalUpdateProductForm = document.getElementById('modalUpdateProductForm')
if (modalUpdateProductForm) {
	modalUpdateProductForm.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes: GET DATA TO attributes
    const productId = button.getAttribute('data-bs-id');
	const productName = button.getAttribute('data-bs-name');
	const price = button.getAttribute('data-bs-price');
	const quantity = button.getAttribute('data-bs-quantity');
	const description = button.getAttribute('data-bs-description');
	const origin = button.getAttribute('data-bs-origin');
	const image = button.getAttribute('data-bs-image');
		console.log(image);
	// Get DOM
	const editFormTitle =document.querySelector('#edit-product-title');
	const editProductId =document.querySelector('#edit-product-id');
	const editProductName =document.querySelector('#edit-product-name');
	const editProductPrice =document.querySelector('#edit-product-price');
	const editProductQuantity =document.querySelector('#edit-product-quantity');
	const editProductDescription =document.querySelector('#edit-product-description');
	const editProductOrigin =document.querySelector('#edit-product-origin');
	const editProductImage =document.querySelector('#edit-product-image');
	const imageRecent =document.querySelector('#image-recent');


    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
	
    editFormTitle.textContent = 'ID: ' + productId;
	editProductId.setAttribute('value', productId);
	editProductName.setAttribute('value', productName);
	editProductPrice.setAttribute('value', price);
	editProductQuantity.setAttribute('value', quantity);
	editProductDescription.textContent=  description;
	editProductOrigin.setAttribute('value', origin);
	editProductImage.setAttribute('value', image)
	//imageRecent.setAttribute('src', 'data:image/jpeg;base64,<' + '?php echo base64_encode('+image+')?>')

  })
}

	</script>