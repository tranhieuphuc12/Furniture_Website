
<!-- Thumbnail -->
<div class="myBackgroundSection">
    <div class="container ">
        <div class="row ">
            <div class="col-10">
                <h6 class="title_h6 h6 text-light">Home Office Furniture</h6>
                <h1 class="title_h1 text-light ">
                    <p>Stay productive and get more work done!</p>
                </h1>
                <a class="shop_collections_btn btn btn-warning" href="#">Shop Collections &emsp;<i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

    </div>
</div>
<!--End Thumbnail -->

<!-- Collections 1 -->
<div class="container mt-5">
    <div class="row ">
        <h2 class="fs-1 fw-bold ">Recent</h2>
        <p class="text-secondary mb-5">Information about the most recently viewed products</p>
        <?php

        if (!empty($productsRecent)) {
            $temp = 0;
            if (count($productsRecent) == 2) {
                $temp = 1;
            } else if (count($productsRecent) == 3) {
                $temp = 2;
            } ?>
            <!-- Recent last -->
            <div class="col-md-6 col-12">
                <div class="img_text">
                    <img src="../asset/img/products/<?php echo $productsRecent[$temp]['image'] ?>" class="img-fluid" style="width: 100%; margin-top: 130px;">
                    <a href="detail.php?id=<?php
                                            echo $productsRecent[$temp]['id'] ?>" class="bottom-left fs-3"><?php echo $productsRecent[$temp]['category_name'] ?> &nbsp <i class="bi bi-arrow-right "></i></a>
                </div>
            </div>

            <?php if (count($productsRecent) >= 2) { ?>
                <!-- Recent older -->
                <div class="col-md-6 col-12">
                    <div class="d-flex flex-column align-items-center bd-highlight mb-3">

                        <?php
                        $temp1 = 0;
                        if (count($productsRecent) == 3) {
                            $temp1 = 1;
                        } ?>
                        <div class="p-1 bd-highlight">
                            <div class="img_text">
                                <img src="../asset/img/products/<?php echo $productsRecent[$temp1]['image'] ?>" class="img-fluid">
                                <a href="detail.php?id=<?php
                                                        echo $productsRecent[$temp1]['id'] ?>" class="bottom-left-2 fs-3"><?php echo $productsRecent[$temp1]['category_name'] ?> &nbsp <i class="bi bi-arrow-right "></i></a>

                            </div>
                        </div>


                        <?php if (count($productsRecent) == 3) { ?>
                            <div class="p-1 bd-highlight mt-5">
                                <div class="img_text">
                                    <img src="../asset/img/products/<?php echo $productsRecent[0]['image'] ?>" class="img-fluid ">
                                    <a href="detail.php?id=<?php
                                                            echo $productsRecent[0]['id'] ?>" class="bottom-left-2 fs-3"><?php echo $productsRecent[0]['category_name'] ?> &nbsp <i class="bi bi-arrow-right "></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

        <?php }
        } ?>
    </div>
</div>
<!-- End Collections 1 -->

<!-- Collections 2 -->
<div class="container">
    <hr class="mt-5">
    <div class="d-flex flex-row  justify-content-around">
        <div class="p-2 bd-highlight">
            <a href="index.php?categoryId=1" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path d="M8 64L8 24H72V64" stroke="#26222F" stroke-width="4"></path>
                        <rect x="2" y="18" width="76" height="6" stroke="#26222F" stroke-width="4"></rect>
                        <path d="M10 56H70" stroke="#26222F" stroke-width="4"></path>
                    </svg>
                </div>
                <div class="fs-5 fw-bold">Tables</div>
            </a>
        </div>
        <div class="p-2 bd-highlight"><a href="index.php?categoryId=2" class="text-decoration-none text-black text-center">

                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path d="M36 10H44C49.5228 10 54 14.4772 54 20V46H26V20C26 14.4772 30.4772 10 36 10Z" stroke="#26222F" stroke-width="4"></path>
                        <path d="M24 46H56C59.3137 46 62 48.6863 62 52V56C62 57.1046 61.1046 58 60 58H20C18.8954 58 18 57.1046 18 56V52C18 48.6863 20.6863 46 24 46Z" stroke="#26222F" stroke-width="4"></path>
                        <path d="M40 60V72" stroke="#26222F" stroke-width="4"></path>
                        <path d="M24 72H56" stroke="#26222F" stroke-width="4"></path>
                        <path d="M19 49L19.0001 38C19.0001 34.6863 21.6864 32 25.0001 32H26.0001" stroke="#26222F" stroke-width="4"></path>
                        <path d="M61 49L60.9999 38C60.9999 34.6863 58.3136 32 54.9999 32H53.9999" stroke="#26222F" stroke-width="4"></path>
                    </svg>
                </div>
                <div class="fs-5 fw-bold">Chairs</div>
            </a></div>
        <div class="p-2 bd-highlight"><a href="index.php?categoryId=3" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path d="M20 16H60C61.1046 16 62 16.8954 62 18V42C62 43.1046 61.1046 44 60 44H20C18.8954 44 18 43.1046 18 42V18C18 16.8954 18.8954 16 20 16Z" stroke="#26222F" stroke-width="4"></path>
                        <path d="M8 65V57C8 52.5817 11.5817 49 16 49H64C68.4183 49 72 52.5817 72 57V65" stroke="#26222F" stroke-width="4"></path>
                        <path d="M16.5 44H63.5C64.8807 44 66 45.1193 66 46.5C66 47.8807 64.8807 49 63.5 49H16.5C15.1193 49 14 47.8807 14 46.5C14 45.1193 15.1193 44 16.5 44Z" stroke="#26222F" stroke-width="4"></path>
                    </svg>
                </div>
                <div class="fs-5 fw-bold">Laptop Stands</div>
            </a></div>
        <div class="p-2 bd-highlight"><a href="index.php?categoryId=4" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <rect x="10" y="10" width="60" height="32" rx="2" stroke="#26222F" stroke-width="4"></rect>
                        <rect x="34" y="42" width="12" height="12" stroke="#26222F" stroke-width="4"></rect>
                        <path d="M24 54H56" stroke="#26222F" stroke-width="4"></path>
                        <path d="M8 72.5V64.5M72 72.5V64.5M8 64.5V56.5H72V64.5M8 64.5H72" stroke="#26222F" stroke-width="4"></path>
                    </svg>

                </div>
                <div class="fs-5 fw-bold">Monitor</div>
            </a></div>

        <div class="p-2 bd-highlight"><a href="index.php?categoryId=5" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path d="M34 28H46" stroke="#26222F" stroke-width="4" stroke-linecap="round"></path>
                        <path d="M34 58H46" stroke="#26222F" stroke-width="4" stroke-linecap="round"></path>
                        <rect x="10" y="10" width="60" height="56" rx="6" stroke="#26222F" stroke-width="4"></rect>
                        <path d="M12 36H68" stroke="#26222F" stroke-width="4"></path>
                        <path d="M16 67V72" stroke="#26222F" stroke-width="4"></path>
                        <path d="M64 67V72" stroke="#26222F" stroke-width="4"></path>
                    </svg>

                </div>
                <div class="fs-5 fw-bold">Cabinets</div>
            </a></div>
        <div class="p-2 bd-highlight"><a href="index.php?categoryId=6" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <rect x="10" y="10" width="60" height="60" rx="6" stroke="#26222F" stroke-width="4"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M40 32C35.5817 32 32 35.5817 32 40V48C32 52.4183 35.5817 56 40 56C44.4183 56 48 52.4183 48 48V40C48 35.5817 44.4183 32 40 32ZM41 36C41 35.4477 40.5523 35 40 35C39.4477 35 39 35.4477 39 36V39C39 39.5523 39.4477 40 40 40C40.5523 40 41 39.5523 41 39V36Z" fill="#26222F"></path>
                    </svg>
                </div>
                <div class="fs-5 fw-bold">Mouse pads</div>
            </a></div>
        <div class="p-2 bd-highlight"><a href="index.php?categoryId=7" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path d="M24 14H52L64.5 41.5L40 69.5" stroke="#26222F" stroke-width="4"></path>
                        <path d="M24 13.5V10.5" stroke="#26222F" stroke-width="8" stroke-linecap="round"></path>
                        <path d="M34 26V28H14V26C14 20.4772 18.4772 16 24 16C29.5228 16 34 20.4772 34 26Z" stroke="#26222F" stroke-width="4"></path>
                        <path d="M24 70H56" stroke="#26222F" stroke-width="4"></path>
                        <circle cx="52" cy="14" r="4" fill="#26222F"></circle>
                        <circle cx="64" cy="41" r="4" fill="#26222F"></circle>
                    </svg>
                </div>
                <div class="fs-5 fw-bold">Study lamps</div>
            </a></div>
        <div class="p-2 bd-highlight"><a href="index.php?categoryId=8" class="text-decoration-none text-black text-center">
                <div class="block d-block icon-list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path d="M28.1868 67.5L22.6313 47.5H57.3687L51.8132 67.5H28.1868Z" stroke="#26222F" stroke-width="4"></path>
                        <path d="M18 47.5H62" stroke="#26222F" stroke-width="4"></path>
                        <path d="M25.9999 46C25.0805 42.5213 24 39.5 20 34C31.6997 34.3063 36 39 39.9998 48" stroke="#26222F" stroke-width="4"></path>
                        <path d="M55.5001 46C56.4195 42.5213 59 38 61.5 34.5C56.5 35.5 53.5 37.5 51 39.5" stroke="#26222F" stroke-width="4"></path>
                        <path d="M30.5 26C30.5 20 30.5 16.5 32 11C38.5 16 41 20 43.5 24" stroke="#26222F" stroke-width="4"></path>
                        <path d="M50 46.5C50 35.5 52 27.5 58.5 19.5C46.8003 19.8063 41 27 39 31" stroke="#26222F" stroke-width="4"></path>
                        <path d="M27.9999 36C27.0805 32.5213 26.5 29.5 22 24.5C33 26 41 30.5 45 46.5" stroke="#26222F" stroke-width="4"></path>
                    </svg>
                </div>
                <div class="fs-5 fw-bold">Desk plants</div>
            </a></div>
    </div>

</div>

<!-- End Collections 2 -->

<!-- Collections 3 -->
<!-- Header -->
<div class="container">
    <hr class="mt-5">
    <?php if ($keyword == '' && $categoryId == 0) { ?>
        <h6 class="title_h6 text-center mt-100px fw-bold text-secondary">NEW ARRIVALS</h6>
        <h2 class="text-center fs-1 fw-bold mb-100px ">Boost your productivity</h2>
    <?php
    } else if ($keyword != '') { ?>
        <h6 class="title_h6 text-center mt-100px fw-bold">SEARCH</h6>
        <h2 class="text-center fs-1 fw-bold mb-100px "><?php echo $keyword ?></h2>
    <?php } else { ?>
        <h6 class="title_h6 text-center mt-100px fw-bold">CATEGORY</h6>
        <h2 class="text-center fs-1 fw-bold mb-100px ">
            <?php foreach ($categories as $category) {
                if ($category['id'] == $categoryId) {
                    echo $category['name'];
                    break;
                }
            } ?></h2>
    <?php } ?>
</div>
<!-- End Header -->

<!-- Products -->
<div class="container">
    <div class="row d-flex flex-wrap">
        <?php
        // var_dump($products);
        foreach ($products as $product) : ?>
            <div class="col-4 mb-5">
                <div class="card" style="width: 25rem;">
                    <img src="../asset/img/products/<?php echo $product['image'] ?>" class="mx-auto card-img-top img-fluid">
                    <div class="card-body">
                        <h5><a class="card-title text-center text-decoration-none" href="detail.php?id=<?php
                                                                                                        echo $product['id'] ?>"><?php echo $product['name'] ?></a></h5>
                        <p class="card-text" style="text-align: justify; text-justify: inter-word;">
                            <?php
                            $arrStr = $product['description'];
                            if (strlen($arrStr) > 70) {
                                $i = strpos($arrStr, " ", 100);
                                echo mb_substr($arrStr, 0, $i) . "<a style='font-size: 14px;' class='text-decoration-none text-secondary' href='detail.php?id=" . $product['id'] . "'> . . . [view more]</a>";
                            } else echo $arrStr ?>
                        </p>

                        <div class="row">
                            <div class="col-8">
                                <?php
                                if ($product['quantity'] > 0) {
                                ?>
                                    <!-- href="add_to_cart.php?productId=< ?php echo $product['id'] ?>&quantity=1&price=< ?php echo $product['price'] ?>" -->

                                    <a onclick="<?php echo (isset($_SESSION['username'])) ? '' : 'return confirm(\'You need sign up before shopping.\')' ?>" href="<?php echo (isset($_SESSION['username'])) ? 'add_to_cart.php?productId=' . $product['id'] . '&quantity=1&price=' . $product['price'] : '#' ?>" class="CartBtn d-inline-block text-decoration-none">
                                        <span class="IconContainer">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart">
                                                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">
                                                </path>
                                            </svg>
                                        </span>
                                        <p class="text mb-0">Add to Cart</p>
                                    </a>
                                <?php
                                } else { ?>
                                    <a class="btn btn-secondary d-inline-block text-decoration-none">
                                        <p class="text mb-0">Sold out</p>
                                    </a>

                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-4">
                                <a onclick="<?php echo (isset($_SESSION['username'])) ? '' : 'return confirm(\'You need sign up before shopping.\')' ?>" href="<?php echo (isset($_SESSION['username'])) ? 'favorite_product.php?productId=' . $product['id'] : '#' ?>">

                                    <i class="bi fs-3 <?php if (in_array($product['id'], $productsFav)) {
                                                            print('bi-heart-fill text-danger');
                                                        } else {
                                                            print('bi-heart');
                                                        }

                                                        ?>
                                "></i></a>
                            </div>
                        </div>




                        <!-- End add to cart -->
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            $pages = ceil($total / $perPage);
            $hrefString = '';
            if ($pages > 1) :
                if (isset($_GET['keyword'])) { // Xu li khi hien thi theo tim kiem: co keyword
                    $hrefString = "&keyword=" . $_GET['keyword'];
                } else if (isset($_GET['categoryId'])) { // Xu li khi hien thi theo danh muc
                    $hrefString = "&categoryId=" . $_GET['categoryId'];
                }

                if ($page != 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=1<?php echo $hrefString ?>" aria-label="First">
                            <span aria-hidden="true">&laquo;&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?php echo (($page - 1) . $hrefString) ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php
                endif;
                for ($i = 1; $i <= $pages; $i++) :
                ?>
                    <li class="page-item"><a <?php echo ($page == $i) ? ' style="background:#ffca2c; color: #d10000;"' : '' ?> class="page-link btn btn-outline-warning" href="index.php?page=<?php echo $i . $hrefString ?>"><?php echo $i ?></a></li>

                <?php
                endfor;
                if ($page != $pages) :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?php echo ($page + 1) . $hrefString ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?php echo $pages . $hrefString ?>" aria-label="Last">
                            <span aria-hidden="true">&raquo;&raquo;</span>
                        </a>
                    </li>
            <?php
                endif;
            endif;
            ?>
        </ul>
    </nav>
    <!-- End pagination -->

    <!-- View all button-->
    <hr class="mt-30px text-warning">
    <div class="text-center">
        <a class="shop_collections_btn btn btn-warning text-center" href="index.php">View all products &emsp;<i class="bi bi-arrow-right"></i></a>
    </div>
</div>
<!-- End Products -->
<!-- End Collections 3 -->

<!-- Collections 4 -->

<div class="bg-gray">
    <div class="container">
        <div class="row p-3">
            <div class="col-3">
                <div class="row">
                    <div class="col-2">
                        <i class="bi bi-truck text-warning fs-1"></i>
                    </div>
                    <div class="col-10">
                        <h6 class="fw-bold mt-1rem">Free Shipping</h6>
                        <span class="text-secondary">Lorem ipsum amet consectetur </span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-2">
                        <i class="bi bi-clock text-warning fs-1"></i>
                    </div>
                    <div class="col-10">
                        <h6 class="fw-bold mt-1rem">Support 24/7</h6>
                        <span class="text-secondary">Lorem ipsum amet consectetur </span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-2">
                        <i class="bi bi-cash-coin text-warning fs-1"></i>
                    </div>
                    <div class="col-10">
                        <h6 class="fw-bold mt-1rem">Money return</h6>
                        <span class="text-secondary">Lorem ipsum amet consectetur </span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-2">
                        <i class="bi bi-gift-fill text-warning fs-1"></i>
                    </div>
                    <div class="col-10">
                        <h6 class="fw-bold mt-1rem">Member discount</h6>
                        <span class="text-secondary">Lorem ipsum amet consectetur </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Collections 4 -->
<!-- Collections 5 -->
<div class="container mt-100px">
    <h2 class="text-center fw-bold fs-1">WISH LIST</h2>
    <p class="text-secondary text-center">Duis enim fermentum id et molestie arcu sagittis, sapien turpis praesent
        consectetur <br> dolor lobortis posuere adipiscing</p>

    <div style="min-height: 200px;" class="row">
        <!-- carousel wish list -->
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: black;"></button>
                <?php
                $i = 1;
                foreach ($listFav as $productFav) {
                    if ($i != sizeof($listFav)) { ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i++ ?>" aria-label="Slide <?php echo $i ?>" style="background-color: black;"></button>
                <?php
                    }
                } ?>
            </div>
            <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ($listFav as $productFav) : ?>
                    <div class="carousel-item <?php echo (($i++ == 0) ? 'active' : '') ?>">
                        <div class="d-flex" style="margin-bottom: 150px;">
                            <img src="../asset/img/products/<?php echo $productFav['image'] ?>" class=" mx-auto d-block img-fluid" alt="...">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-black">
                                <?php echo $productFav['name'] ?>
                            </h5>
                            <p class="text-black" style="padding: 0px 100px;">
                                <?php
                                $arrStr = $product['description'];
                                if (strlen($arrStr) > 70) {
                                    $i = strpos($arrStr, " ", 100);
                                    echo mb_substr($arrStr, 0, $i) . "<a style='font-size: 14px;' class='text-decoration-none text-secondary' href='detail.php?id=" . $product['id'] . "'> . . . [view more]</a>";
                                } else echo $arrStr ?>
                            </p>
                        </div>
                    </div>
                <?php
                endforeach ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon " aria-hidden="true" style="background-color: black;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


<div class="myBackgroundOverlay mt-100px">
    <div class="container ">
        <h6 class="title_h6 h6 text-light text-center pt-100px">
            CUSTOM SETUPS</h6>
        <h1 class="title_h1 text-light text-center">
            <p>Let’s build your dream <br> working space</p>
        </h1>
        <div class="text-center">
            <a class="shop_collections_btn btn btn-warning mt-5" href="#">Shop now &emsp;<i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>
<!-- End Collections 5 -->