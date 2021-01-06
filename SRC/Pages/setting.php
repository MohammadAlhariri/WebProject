<?php

include "IncludesParts/header.php";

?>
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">


                    <img id="imgLogo" class="rounded-circle mt-5" src="<?php
                    if ($_SESSION['parent'] == 'Users' || $_SESSION['parent'] == 'Admins') {
                        echo $_SESSION["userImage"];
                    } else if ($_SESSION['parent'] == 'seller') {
                        echo $_SESSION["sellerImage"];
                    }
                    ?>"
                         onclick="document.getElementById('fileInput').click();"
                         width="250">
                    <h3 class="p-2">Please click on profile photo to change it </h3></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">

                    <form action="../model/updateUserProfile.php" method="post" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back"><i
                                        class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                <h6>Back to home</h6>
                            </div>
                            <h6 class="text-right">Edit Profile</h6>
                        </div>
                        <?php
                        if ($_SESSION['parent'] == "Users" || $_SESSION['parent'] == "Admins") {
                            ?>
                            <div class="row mt-2">
                                <div class="col-md-6"><label for="name">Full Name</label></div>
                                <div class="col-md-6"><input id="name" name="name" type="text" class="form-control"
                                                             value="<?php echo $_SESSION["userName"]; ?>"
                                                             placeholder="Enter Full Name"></div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6"><label for="phone">Phone</label></div>
                                <div class="col-md-6"><input disabled id="phone" name="phone" type="number"
                                                             class="form-control"
                                                             value="<?php echo $_SESSION["userPhone"]; ?>"
                                                             placeholder="Enter Phone number"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label for="email">Email address</label></div>
                                <div class="col-md-6"><input id="email" name="email" type="email" class="form-control"
                                                             value="<?php echo $_SESSION["userEmail"]; ?>"
                                                             placeholder="Enter Email"></div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6"><label for="address">Address</label></div>
                                <div class="col-md-6"><input id="address" name="address" type="text"
                                                             class="form-control"
                                                             value="<?php echo $_SESSION["userAddress"]; ?>"
                                                             placeholder="Enter Address"></div>
                            </div>
                        <?php } else if ($_SESSION['parent'] == "seller") {
                            ?>
                            <div class="row mt-2">
                                <div class="col-md-6"><label for="name">Full Name</label></div>
                                <div class="col-md-6"><input id="name" name="name" type="text" class="form-control"
                                                             value="<?php echo $_SESSION["sellerName"]; ?>"
                                                             placeholder="Enter Full Name"></div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6"><label for="phone">Phone</label></div>
                                <div class="col-md-6"><input id="phone" name="phone" type="number"
                                                             class="form-control"
                                                             value="<?php echo $_SESSION["sellerPhone"]; ?>"
                                                             placeholder="Enter Phone number"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label for="email">Email address</label></div>
                                <div class="col-md-6"><input disabled id="email" name="email" type="email"
                                                             class="form-control"
                                                             value="<?php echo $_SESSION["sellerEmail"]; ?>"
                                                             placeholder="Enter Email"></div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6"><label for="address">Address</label></div>
                                <div class="col-md-6"><input id="address" name="address" type="text"
                                                             class="form-control"
                                                             value="<?php echo $_SESSION["sellerAddress"]; ?>"
                                                             placeholder="Enter Address"></div>
                            </div>
                        <?php } ?>
                        <input name="fileInput" id="fileInput" type="file" accept="image/*"
                               style="position: absolute;top: 20000px;">
                        <div class="row">
                            <div class="col-md-2">
                                <button name="submit" type="submit" class="btn btn-primary text-uppercase">Update
                                    Profile
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php include "IncludesParts/footer.php"; ?>