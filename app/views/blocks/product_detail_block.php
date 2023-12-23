
	<div class="container">
		<div class="row">
			<div class="col">
				<img src="data:image/jpg;base64,<%=product.getImage()%>"
					style="width: 100%; height: auto;">
			</div>
			<div class="col">
				<span class="text-secondary block">
                     <!-- <%=category%> -->
                    </span>
				<h1>
                    <!-- <%=product.getName()%> -->
                </h1>
				<span class="text-secondary fs-4">
                    <!-- $<%=product.getPrice()%>.00 -->
				</span> <span class="text-secondary">& Free Shipping</span>
				<p class="text-secondary">
                    <!-- <%=product.getDescription()%> -->
                </p>
				
				<form action="ProductDetailServlet" class="" method="get">
				 <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border border-secondary-subtle text-center w-25">
				 <input type="hidden" name="id" value="<%= product.getId()%>">				
				<button type="submit" class="shop_collections_btn btn btn-warning ms-3">Add to cart</button>
				</form>
      			<hr class="text-secondary">
         		
      
      
					
			</div>
		</div>
	</div>