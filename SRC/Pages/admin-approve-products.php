<?php
include("IncludesParts/header.php");
require_once "../model/getAllunvalidProduct.php";
require_once "../model/getSellerNameByID.php";

$products = getValues();
?>
    <div class="container">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($products)) { ?>
                <div class=" col-12 col-md-4 col-sm-6" style="border-radius: 10px;" data-aos="fade-up">
                    <div class="card-container">
                        <div class="card">
                            <div class="front">
                                <div class="cover">
                                    <?php echo $row["productCategory"]; ?>
                                </div>
                                <div class="user">
                                    <img class="img-circle" src="../<?php echo $row["productImage"]; ?>"/>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">Name : <?php echo $row["productName"]; ?></h3>
                                        <h3 class="name">Price : <?php echo $row["productPrice"]; ?>$</h3>
                                    </div>

                                </div>
                            </div> <!-- end front panel -->
                            <div class="back ">
                                <div class="header">
                                    <h5 class="motto"><?php echo getName($row["sellerID"]); ?></h5>
                                </div>
                                <div class="content row">
                                    <div class="main">
                                        <div class="container text-center">
                                        <h4 class="text-center"><?php echo $row["productDescription"]; ?></h4>
                                        <p class="text-center"><?php echo  $row["productDate"]; ?></p></div>

                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="footer row">

                                    <div class="social-links text-center row">
                                        <form class="col-md-3 offset-md-2" action="../model/removeByID.php" method="post">
                                            <input type="hidden" name="id"
                                                   value="<?php echo $row["productID"]; ?>"/>
                                            <input value="Decline" type="submit" class="btn btn-outline-primary">
                                        </form>
                                        <form class="col-md-3" action="../model/approveProduct.php" method="post">
                                            <input type="hidden" name="productID"
                                                   value="<?php echo $row["productID"]; ?>"/>
                                            <input value="Approve" type="submit" class="btn btn-outline-primary ">
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

