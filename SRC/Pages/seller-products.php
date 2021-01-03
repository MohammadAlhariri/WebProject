<?php
include("IncludesParts/header.php");
include "../model/getAllProductsOfSeller.php";
$products = getValues($_SESSION["sellerID"]);
?>
    <div class="container">
        <div class="row">
            <?php
            while ($r = mysqli_fetch_array($products)) { ?>
                <div class=" col-12 col-md-4 col-sm-6" style="border-radius: 10px;" data-aos="fade-up">
                    <div class="card-container">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <?php echo $r["productCategory"]; ?>
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="../<?php echo $r["productImage"]; ?>"/>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Name : <?php echo $r["productName"]; ?></h3>
                                        <h3 class="name">Price : <?php echo $r["productPrice"]; ?>$</h3>
                                    </div>

                                </div>
                            </div> <!-- end front panel -->
                            <div class="back ">
                                <div class="header">
                                    <h5 class="motto"><?php echo $r["productDate"]; ?></h5>
                                </div>
                                <div class="content row">
                                    <div class="main">
                                        <div class="container text-center">
                                        <h4 class="text-center"><?php echo $r["productDescription"]; ?></h4>
                                        <p class="text-center"><?php echo $r["productState"]; ?></p></div>

                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="footer row">

                                    <div class="social-links text-center row">
                                        <form class="col-md-3 offset-md-2" action="update-product-seller.php" method="post">
                                            <input type="hidden" name="id"
                                                   value="<?php echo $r["productID"]; ?>"></input>
                                            <input value="Edit" type="submit" class="btn btn-outline-primary">
                                        </form>
                                        <form class="col-md-3" action="../model/removeByID.php" method="post">
                                            <input type="hidden" name="id"
                                                   value="<?php echo $r["productID"]; ?>"></input>
                                            <input value="Remove" type="submit" class="btn btn-outline-primary ">
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end back panel -->
                        </div> <!-- end card -->
                    </div> <!-- end card-container -->
                </div> <!-- end col sm 3 -->


            <?php } ?>
        </div>

    </div>
<?php include("IncludesParts/footer.php");

