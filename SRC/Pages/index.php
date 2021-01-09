<?php

include "IncludesParts/header.php";
include "../model/getAllValidProducts.php";
$products = getAllProducts();
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
                                <?php //echo $r["productCategory"]; ?>
                                Hello
                            </div>
                            <div class="user">
                                <!-- <img class="img-circle" src="../<?php /*//echo $r["productImage"]; */ ?>"/>-->
                                <img class="img-circle" src="assets/images/big-01.jpg"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h5 class="name">Name : <?php //echo $r["productName"]; ?></h5>
                                    <h5 class="name">Price : <?php //echo $r["productPrice"]; ?>$</h5>
                                </div>

                            </div>
                        </div> <!-- end front panel -->
                        <div class="back ">
                            <div class="header">
                                <h5 class="motto"> Hello <?php //echo $r["productDate"]; ?></h5>
                            </div>
                            <div class="content row">
                                <div class="main">
                                    <div class="container text-center">
                                        <h5 class="text-center">Hello <?php //echo $r["productDescription"]; ?></h5>
                                        <p class="text-center">Hello <?php //echo $r["productState"]; ?></p></div>

                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="footer row">

                                <div class="social-links text-center row">
                                    <form class="col-md-12 "
                                          action="update-product-seller.php"
                                          method="post">
                                        <input type="hidden" name="id"
                                               value="<?php //echo $r["productID"]; ?>"/>
                                        <input value="Order Now" type="submit"
                                               class="btn btn-outline-primary">
                                    </form>
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
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                        <div class="col-md-6">
                            <div class="card-container ">
                                <div class="card">
                                    <div class="front" style="background: url('assets/images/big-01.jpg') center center no-repeat ;
                                                               background-size: cover ; border: 7px solid white">
                                        <div class="cover text-dark">
                                            <?php //echo $r["productCategory"]; ?>
                                            name
                                        </div>


                                    </div>
                                    <div class="back ">
                                        <div class="container">
                                            <div class="text-center">
                                                <h5 class="text-primary text-center">
                                                    Category: <?php //echo $r["productDate"]; ?></h5>
                                            </div>
                                            <div class="row">


                                                <h5 class="text-danger w-100 text-center ">
                                                    Price :$ <?php //echo $r["productDescription"]; ?></h5>
                                                <p class="text-primary text-center w-100 "
                                                   style="overflow: hidden; height: 100px">
                                                    description: Lorem ipsum dolor sit Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Animi dolorum eum fuga illo ipsum iure
                                                    necessitatibus neque nesciunt nisi officiis praesentium quaerat
                                                    repellat sapiente sint tempore temporibus tenetur ullam, ut, veniam
                                                    voluptatibus! A accusamus, alias aliquid assumenda beatae delectus
                                                    dicta ducimus esse eveniet illum impedit ipsa itaque iusto
                                                    laudantium libero natus nostrum officia officiis provident quaerat
                                                    quod saepe sapiente similique sit soluta vero vitae. Dolores dolorum
                                                    ea eos harum modi quia quidem, sequi vel! Commodi delectus ea
                                                    eligendi labore magnam quae, quaerat quibusdam soluta veniam!
                                                    Accusamus asperiores consectetur culpa dicta dignissimos distinctio
                                                    earum eius, iste, laudantium porro sit soluta, velit. amet,
                                                    consectetur adipisicing elit. Dolores quas ullam vel! Adipisci animi
                                                    cumque dolore ea eligendi eos est facere, illum in inventore ipsa
                                                    laborum, modi mollitia necessitatibus officiis possimus provident
                                                    quaerat quo quod ratione sed veritatis voluptatum. Alias
                                                    consequuntur delectus dignissimos numquam perspiciatis praesentium
                                                    repellat, saepe suscipit tempora? Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Assumenda,
                                                    perferendis? <?php //echo $r["productState"]; ?></p>


                                            </div>
                                            <div class="clear"></div>
                                            <div class="footer m-0">

                                                <div class=" text-center row">
                                                    <form class="col-md-12 "
                                                          action="update-product-seller.php"
                                                          method="post">
                                                        <input type="hidden" name="id"
                                                               value="<?php //echo $r["productID"]; ?>"/>
                                                        <input value="Order Now" type="submit"
                                                               class="btn btn-outline-primary">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div>
                        </div>
                    <?php } ?>
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