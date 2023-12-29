<div class="container mt-3">
    <div class="d-flex justify-content-center align-item-center">
        <div class="management-order">
            <a style="padding: 9px 20px; width: 100px;" href="../public/profile_process.php" class="btn btn-warning shop_collections_btn">Back</a>
        </div>
    </div>
    <div scope="col" class="my-5">
        <h2 class="font-italic inline-block title_h6 text-secondary text-center">#<?php echo $products[0]['order_id'] ?></h2>
        <h4 class="fst-italic fs-4 text-secondary text-center"> <?php echo ($status == 1) ? 'Unprocessed' : 'Processed' ?></h4>
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
                    <h5 class="inline-block title_h6 text-secondary text-center"><i class="bi bi-card-image"></i></h5>
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
            $totalCoG = 0;
            foreach ($products as $product) :
                $totalCoG += ($product['quantity'] * $product['price']); ?>
                <tr>
                    <th scope="row">
                        <h6 class="py-2  text-secondary text-center"><?php echo $i++ ?>
                        </h6>
                    </th>
                    <th scope="row">
                        <h6 class="py-2  text-secondary text-center"><?php echo $product['product_id'] ?>
                        </h6>
                    </th>

                    <td>
                        <h6 class=" py-2  text-secondary text-center">
                            <?php echo $product['name'] ?>
                        </h6>
                    </td>

                    <td>
                        <h6 class=" py-2  text-secondary text-center">
                            <img style="width:100px;" src="../asset/img/products/<?php echo $product['image'] ?>">

                        </h6>
                    </td>
                    <td>
                        <h6 class=" py-2  text-secondary text-center">x
                            <?php echo $product['quantity'] ?>
                        </h6>
                    </td>

                    <td>
                        <h6 class=" py-2  text-secondary text-center">
                            <?php echo $product['price'] ?>
                        </h6>
                    </td>
                    <td>
                        <h6 class=" py-2  text-secondary text-center">
                            <?php echo ($product['quantity'] * $product['price']) ?>
                        </h6>
                    </td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <div class="row">
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

                        if ($discountModel->getPercentDiscountsByTotalDESC($totalCoG) != null) {
                            $percentByTotal = $discountModel->getPercentDiscountsByTotalDESC($totalCoG)[0]['percentage'];
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
                        print($totalCoG - $discount);
                        ?>
                        $
                    </td>
                </tr>

            </table>
        </div>
        <div class="col-sm-4 mt-5 mb-5"></div>
    </div>
</div>