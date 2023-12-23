<div class="container mt-3">
		<h2 class="fw-bold title_h6">Cart</h2>
		<div class="row">
			<div class="col-sm-8">
				<table class="table table-sm table-hover">
					<thead>
						<tr>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Product</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Price</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary ">Quantity</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">Subtotal</h5></th>
							<th scope="col"><h5
									class="inline-block title_h6 text-secondary">
									<i class="bi bi-trash3"></i>
								</h5></th>
						</tr>
					</thead>
					<tbody>
						<!-- <%
						for (int i = 0; i < products.size(); i++) {
						%>
						<tr>
							<th scope="row"><img class="thumnail"
								src="data:image/jpg;base64,<%=products.get(i).getImage()%>">
								<h6
									class="title_h6 fs-7  ms-5 text-secondary align-top text-wrap"
									style="width: 6rem;"><%=products.get(i).getName()%>
								</h6></th>
							<td><h6 class="title_h6 text-secondary text-center">
									$<%=products.get(i).getPrice()%>.00
								</h6></td>
							<td><div class="btn-group" role="group"
									aria-label="Basic mixed styles example">
									<a
										href="CartDetailServlet?id=<%=products.get(i).getId()%>&minus=1"
										type="button" class="btn btn-sm"">-</a> <input
										readonly="readonly" value="<%=productQuantily.get(i)%>"
										name="quantity" class=" border-0 text-center w-25"> <a
										href="CartDetailServlet?id=<%=products.get(i).getId()%>&plus=1"
										type="button" class="btn btn-sm"">+</a>
								</div></td>
							<td><h6 class="title_h6 text-secondary text-center">
									$<%=products.get(i).getPrice() * productQuantily.get(i)%>.00
								</h6></td>
							<td><a type="button"  class="bg-white border border-white"  onclick="javascript:return confirm('You want to delete this product ?')" href="CartDetailServlet?delete=<%=products.get(i).getId()%>"><i class="bi bi-x-circle"></i></a></td>

						</tr>
						<%
						}
						%>
					</tbody> -->
				</table>
			</div>
			<div class="col-sm-4">
				<table class="table table-sm table-hover">
					<thead>
						<tr>
							<th scope="col"><h6 class="inline-block title_h6 fw-bold">Cart
									Totals</h6></th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><h6
									class="title_h6 ms-5 text-secondary align-top">Subtotal</h6></th>
							<td><h6 class="title_h6 text-secondary text-center">
									<!-- $<%=totalPrice%>.00 -->
								</h6></td>

						</tr>
						<tr>
							<th scope="row"><h6
									class="title_h6 ms-5 text-secondary align-top">Total</h6></th>
							<td><h6 class="title_h6 text-secondary text-center">
									<!-- $<%=totalPrice%>.00 -->
								</h6></td>

						</tr>
						<tr>
							<th><a
								class="shop_collections_btn btn btn-warning align-center mt-4"
								href="#">Proceed to checkout</a></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>