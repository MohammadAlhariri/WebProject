<?php

include "IncludesParts/header.php";
include "../model/getAllValidProducts.php";
$products = getAllProducts();
?>

    <form action="" method="POST"></form>

    <!-- Page Content -->
    <!-- Banner Starts Here -->

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="caption">
                        <h2><span id="elogo">e</span>-Commerce</span></h2>
                        <div class="line-dec"></div>
                        <p>Welcome to <strong>online eCommerce shop</strong> you can choose which product you want and
                            we will ship it as soon as fast.
                            <br><br>Please tell your friends about <a rel="nofollow"
                                                                      href="https://www.facebook.com/tooplate/">our
                                Shop</a> Thank you.</p>
                        <div class="main-button">
                            <a href=''>Order Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->
<?php

?>
    <!-- Featured Starts Here -->
    <div class="featured-items">
        <div class="cntainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>Featured Items</h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <?php
                        while ($row = mysqli_fetch_array($products)) {

                            ?>
                            <a href="single-product.php">
                                <div class="featured-item">
                                    <img src="../<?php echo $row["productImage"]; ?>"
                                         alt="<?php echo $row['productName']; ?>">

                                    <h4><?php echo $row["productName"]; ?></h4>
                                    <h6><?php echo $row["productPrice"]; ?></h6>

                                </div>

                            </a>
                        <?php } ?>
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-02.jpg" alt="Item 2">-->
                        <!--                                <h4>Erat odio rhoncus</h4>-->
                        <!--                                <h6>$25.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-03.jpg" alt="Item 3">-->
                        <!--                                <h4>Integer vel turpis</h4>-->
                        <!--                                <h6>$35.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-04.jpg" alt="Item 4">-->
                        <!--                                <h4>Sed purus quam</h4>-->
                        <!--                                <h6>$45.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-05.jpg" alt="Item 5">-->
                        <!--                                <h4>Morbi aliquet</h4>-->
                        <!--                                <h6>$55.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-06.jpg" alt="Item 6">-->
                        <!--                                <h4>Urna ac diam</h4>-->
                        <!--                                <h6>$65.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-04.jpg" alt="Item 7">-->
                        <!--                                <h4>Proin eget imperdiet</h4>-->
                        <!--                                <h6>$75.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!--                        <a href="single-product.php">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-05.jpg" alt="Item 8">-->
                        <!--                                <h4>Nullam risus nisl</h4>-->
                        <!--                                <h6>$85.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                        <!---->
                        <!--                        <a href="single-product.php?id=knncnjcnj">-->
                        <!--                            <div class="featured-item">-->
                        <!--                                <img src="assets/images/item-06.jpg" alt="Item 9">-->
                        <!--                                <h4>Cras tempus</h4>-->
                        <!--                                <h6>$95.00</h6>-->
                        <!--                            </div>-->
                        <!--                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featred Ends Here -->


<?php include "IncludesParts/footer.php";