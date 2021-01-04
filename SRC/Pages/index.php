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
                            <a href="single-product.php?productID=<?php echo $row["productID"]; ?>">
                                <div class="featured-item">
                                    <img src="../<?php echo $row["productImage"]; ?>"
                                         alt="<?php echo $row['productName']; ?>">

                                    <h4><?php echo $row["productName"]; ?></h4>
                                    <h6>$<?php echo $row["productPrice"]; ?></h6>

                                </div>

                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featred Ends Here -->


<?php include "IncludesParts/footer.php";