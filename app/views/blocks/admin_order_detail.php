<div>
    <div class="management-order">
        <a href="index.php" class="btn btn-info">Back</a>
    </div>
</div>

<div class="container mt-3">
    <div scope="col">
        <h2 class="font-italic inline-block title_h6 text-secondary text-center">#<?php echo $products[0]['order_id'] ?> - <?php echo $username ?></h2>
    </div>

    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">#</h5>
                </th>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">ID</h5>
                </th>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">Product</h5>
                </th>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">Image</h5>
                </th>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">Quantity</h5>
                </th>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">Unit price</h5>
                </th>
                <th scope="col">
                    <h5 class="inline-block title_h6 text-secondary text-center">Total money</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($products as $product) : ?>
                <tr>
                    <th scope="row">
                        <h6 class="py-2 title_h6 text-secondary text-center"><?php echo $i++ ?>
                        </h6>
                    </th>
                    <th scope="row">
                        <h6 class="py-2 title_h6 text-secondary text-center"><?php echo $product['product_id'] ?>
                        </h6>
                    </th>

                    <td>
                        <h6 class=" py-2 title_h6 text-secondary text-center">
                            <?php echo $product['name'] ?>
                        </h6>
                    </td>

                    <td>
                        <h6 class=" py-2 title_h6 text-secondary text-center">
                            <img style="width:100px;" src="data:image/jpeg;base64, <?php echo base64_encode($product['image']) ?>">
                            
                        </h6>
                    </td>
                    <td>
                        <h6 class=" py-2 title_h6 text-secondary text-center">
                            <?php echo $product['quantity'] ?>
                        </h6>
                    </td>

                    <td>
                        <h6 class=" py-2 title_h6 text-secondary text-center">
                            <?php echo $product['price'] ?>
                        </h6>
                    </td>
                    <td>
                        <h6 class=" py-2 title_h6 text-secondary text-center">
                            <?php echo ($product['quantity'] * $product['price']) ?>
                        </h6>
                    </td>

                </tr>
            <?php endforeach ?>

            <!-- <%
				}
				%> -->
        </tbody>
    </table>
</div>