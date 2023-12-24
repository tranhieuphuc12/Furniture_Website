<!-- Switch page -->
<div>
    <div  class="management-order">
        <a  href="" class="btn btn-info">Orders</a>
    </div>
    <div  class="management-product">
        <a  href="" class="btn btn-outline-info">Products</a>
    </div>
</div>

<div class="container mt-3">
		<h2 class="fw-bold title_h6">Orders</h2>
		<button type="button"
			class="nav-link text-dark shop_collections_btn btn btn-warning title_a"
			data-bs-toggle="modal" data-bs-target="#modalAddProductForm">

		</button>


		<table class="table table-sm table-hover">
			<thead>
				<tr>
				<th scope="col"><h5
							class="inline-block title_h6 text-secondary">#</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">ID</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Customer</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">Action</h5></th>
					<th scope="col"><h5
							class="inline-block title_h6 text-secondary">
							<i class="bi bi-trash3"></i>
						</h5></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i = 1;
				foreach ($products as $product) :?>
				<tr>
					<th scope="row"><?php echo $i++?></th>
					<th scope="row"><h6
							class="title_h6 text-secondary text-center"><?php echo $product['id']?>
						</h6></th>
					<td><img class="thumnail"
						src="data:image/jpg;base64,<%=products.get(i).getImage()%>">
						<h6 class="title_h6 fs-7  ms-5 text-secondary align-top text-wrap"
							style="width: 6rem;">
                            <!-- <%=products.get(i).getName()%> -->
						</h6></td>
					<td><h6 class="title_h6 text-secondary text-center">
							<!-- $<%=products.get(i).getPrice()%>.00 -->
						</h6></td>
					<td><h6 class="title_h6 text-secondary text-center">
							<!-- <%
							if (products.get(i).getDescription().length() > 100)
								out.print(products.get(i).getDescription().substring(0, 20) + "...");
							else
								out.print(products.get(i).getDescription());
							%> -->
						</h6></td>
					<td><h6 class="title_h6 text-secondary text-center">
							<!-- <%=products.get(i).getOrigin()%> -->
						</h6></td>
					<td><h6 class="title_h6 text-secondary text-center">
							<!-- <%=CategoryDAO.getCategoryName(products.get(i).getCategory_id())%> -->
						</h6></td>
					<td><button id="update_button" type="button"
							data-bs-toggle="modal" data-bs-target="#modalUpdateProductForm"
							data-bs-id="<%=products.get(i).getId()%>"
							data-bs-name="<%=products.get(i).getName()%>"
							data-bs-price="<%=products.get(i).getPrice()%>"
							data-bs-description="<%=products.get(i).getDescription()%>"
							data-bs-category="<%=CategoryDAO.getCategory(id)%>"
							data-bs-categoryID="<%=CategoryDAO.getCategory(id)%>"
							data-bs-origin="<%=products.get(i).getOrigin()%>"
							class="border border-0 bg-transparent">

							<i class="bi bi-exposure"></i>
						</button></td>
					<td><a type="button" class="bg-white border border-white" onclick="javascript:return confirm('You want to delete this product ?')"
						href="DeleteProductServlet?id=<%=products.get(i).getId()%>"><i
							class="bi bi-x-circle"></i></a></td>
				</tr>
				<?php endforeach ?>
				
				<!-- <%
				}
				%> -->
			</tbody>
		</table>
	</div>
	<!-- Modal Add Product Form  -->
	<div class="modal fade" id="modalAddProductForm" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="CreateProductServlet" method="post"
						enctype='multipart/form-data'>
						<div class="mb-3">
							<label class="form-label">Name</label> <input type="text"
								class="form-control" id="name" name="name"
								placeholder="Product Name" />
						</div>
						<div class="mb-3">
							<label class="form-label">Price</label> <input type="text"
								class="form-control" id="price" name="price" placeholder="Price" />
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Description</label>
							<textarea class="form-control" placeholder="Description"
								id="description" name="description"></textarea>
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Origin</label> <input
								class="form-control" placeholder="origin" id="origin"
								name="origin">
						</div>
						<div class="mb-3">
							<label for="formFile" class="form-label">Image</label> <input
								class="form-control" type="file" id="image" name="image">
						</div>
						<div class="mb-3">

							<label for="category_choose">Category</label> <select
								name="category_choose" class="form-select"
								aria-label="Default select example">

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
	<div class="modal fade" id="modalUpdateProductForm" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="UpdateProductServlet" method="post"
						enctype='multipart/form-data'>
						<input type="hidden" class="form-control" id="id" name="id"
							placeholder="id" />
						<div class="mb-3">
							<label class="form-label">Name</label> <input type="text"
								class="form-control" id="name" name="name"
								placeholder="Product Name" />
						</div>
						<div class="mb-3">
							<label class="form-label">Price</label> <input type="text"
								class="form-control" id="price" name="price" placeholder="Price" />
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Description</label>
							<textarea class="form-control" placeholder="Description"
								id="description" name="description"></textarea>
						</div>
						<div class="mb-3">
							<label for="floatingTextarea">Origin</label> <input
								class="form-control" placeholder="origin" id="origin"
								name="origin">
						</div>
						<div class="mb-3">
							<label for="formFile" class="form-label">Image</label> <input
								class="form-control" type="file" id="image" name="image">
						</div>
						<div class="mb-3">

							<label for="category_choose">Category</label> <select
								id="category_choose" name="category_choose" class="form-select"
								aria-label="Default select example">
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