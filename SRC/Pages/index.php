<?php

include "IncludesParts/header.php";
include "../model/getAllValidProducts.php";
$products = getAllProducts();
$r = mysqli_fetch_array($products);
?>

    <div class="row">
        <div class="col-md-6 offset-6 text-center p-1 " style="color: #e2622b;font-weight:900">
            <div class="container">
                <div class="container">
                    <div class="col-md-12 text-center my-1 p-1 "
                         style="color: #e2622b ;border-radius: 10px;box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);">
                        <h4>Check new Products </h4></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="container">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <?php echo $r["productCategory"]; ?>
                                Hello
                            </div>
                            <div class="user">
                                <img class="img-circle" src="../<?php echo $r["productImage"];  ?>"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h5 class="name">Name : <?php echo $r["productName"]; ?></h5>
                                    <h5 class="name">Price : <?php echo $r["productPrice"]; ?>$</h5>
                                </div>

                            </div>
                        </div> <!-- end front panel -->
                        <div class="back ">
                            <div class="header">
                                <h5 class="motto">  <?php echo $r["productDate"]; ?></h5>
                            </div>
                            <div class="content row">
                                <div class="main">
                                    <div class="container text-center">
                                        <h5 class="text-center"><?php echo $r["productDescription"]; ?></h5>
                                        </div>

                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="footer row">

                                <div class="social-links text-center row">

                                    <a value="Order Now"
                                       href="single-product.php?productID=<?php echo $r["productID"]; ?>"
                                       class="btn btn-outline-primary"> Order Now</a>

                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="container ">

                <div class="row index-card">
                    <?php
                    $products = getAllProducts();
                    $i = 1;
                    while ($r = mysqli_fetch_array($products)) { ?>
                        <div class="col-md-6">
                            <div class="card-container ">
                                <div class="card">
                                    <div class="front" style="background: url('../<?php echo $r["productImage"]; ?>') center center no-repeat ;
                                                               background-size: cover ; border: 7px solid white">
                                        <div class="cover text-dark">
                                            <?php echo $r["productCategory"]; ?>

                                        </div>


                                    </div>
                                    <div class="back ">
                                        <div class="container">
                                            <div class="text-center">
                                                <h5 class="text-primary text-center">
                                                    Category: <?php echo $r["productCategory"]; ?></h5>
                                            </div>
                                            <div class="row">


                                                <p class="text-danger w-100 text-center ">
                                                    Price :$ <?php echo $r["productPrice"]; ?></p>
                                                <br>
                                                <p class="text-primary text-center w-100 "
                                                   style="overflow: hidden; height: 100px">
                                                    description: <?php echo $r["productDescription"]; ?></p>


                                            </div>
                                            <div class="clear"></div>
                                            <div class="footer m-0">

                                                <div class=" text-center row">

                                                    <a value="Order Now"
                                                       href="single-product.php?productID=<?php echo $r["productID"]; ?>"
                                                       class="btn btn-outline-primary"> Order Now</a>


                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div>
                        </div>
                        <?php $i++;
                        if ($i == 5) {
                            break;
                        }
                    } ?>

                </div>
            </div>
        </div>
    </div>

    <!--<div class="banner">
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
    </div>-->
    <div class="row m-2">
        <div class="container"><h3 class="p-2"
                                   style="color: #e2622b ;border-radius: 10px;box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);">
                Featured Items</h3></div>
    </div>
    <div class="row">
        <!-- Featured Starts Here -->
        <div class="featured-items">

            <div class="row">

                <div class="col-md-12">

                    <div class="owl-carousel owl-theme w-100">
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
        <!-- Featred Ends Here -->
    </div>

<?php include "IncludesParts/footer.php";
?>