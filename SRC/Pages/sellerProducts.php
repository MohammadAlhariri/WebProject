<?php include("IncludesParts/header.php"); ?>
    <div class="container">
        <div class="row">
            <?php
            include("../dataSources/config/connectWithRemoteDB.php");
            $connect = new DbConnection();
            $sid = $_SESSION["sellerID"];
            $sql = "SELECT * FROM `product`where sellerID = '$sid'";
            $result = mysqli_query($connect->getdbconnect(), $sql);
            while ($r = mysqli_fetch_array($result)) { ?>
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
                                        <h4 class="text-center"><?php echo $r["productDescription"]; ?></h4>
                                        <p class="text-center"><?php echo $r["productState"]; ?></p>

                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="footer row">

                                    <div class="social-links text-center">
                                        <form action="update-product-seller.php" method="post">
                                            <input type="hidden" name="id"
                                                   value="<?php echo $r["productID"]; ?>"></input>
                                            <input value="Edit" type="submit" class="btn btn-outline-primary">Edit</input>
                                        </form>
                                        <form action="../model/removeByID.php" method="post">
                                            <input type="hidden" name="id"
                                                   value="<?php echo $r["productID"]; ?>"></input>
                                            <input value="Edit" type="submit" class="btn btn-outline-primary ">Remove</input>
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

