<?php

include "IncludesParts/header.php";

?>
    <div class="bg-white">
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
                         width="250" height="250">
                </div>
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


                            <div class="row mt-3 p-2">
                                <div class="col-md-6"><label for="address">Address</label></div>
                                <div class="col-md-6"><input id="address" name="address" type="text"
                                                             class="form-control"
                                                             value="<?php echo $_SESSION["sellerAddress"]; ?>"
                                                             placeholder="Enter Address"></div>
                            </div>
                        <?php } ?>
                        <div class="form-group m-1 p-2 fileTo">
                            Upload Profile Picture
                            <input class="form-control hide_file" name="fileInput" id="fileInput" type="file"
                                   accept="image/*">
                        </div>
                        <div class="row p-2">
                            <div class="col-md-2">
                                <button name="submit" type="submit" class="btn btn-primary text-uppercase p-2">Update
                                    Profile
                                </button>
                            </div>
                        </div>
                    </form>


                    <div class="row mt-2 border-top  p-2">
                        <div class="container">
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#passw"
                                    aria-expanded="false" aria-controls="passw">
                                Update Password <i class="fa fa-key m-2 " style="color: #e2622b ;font-size: 20px;font-weight: bold"></i>
                            </button>
                            <div class="collapse" id="passw">

                                <div class="container">
                                    <form action="../model/updatePassword.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-10">

                                                <label>New Password</label>
                                                <div class="form-group pass_show">
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="New Password">
                                                </div>
                                                <label>Confirm Password</label>
                                                <div class="form-group pass_show">
                                                    <input type="password" name="repassword" class="form-control"
                                                           placeholder="Confirm Password">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button name="submit" type="submit"
                                                        class="btn btn-primary text-uppercase">Update
                                                    Password
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($_SESSION['parent'] == 'Users' || $_SESSION['parent'] == 'Admins') { ?>
                        <div class="row mt-2 border-top  p-2">
                            <div class="container">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#security"
                                        aria-expanded="false" aria-controls="security">
                                    Set security Questions   <i class="fa fa-lock m-2" style="color: #e2622b; font-size: 20px;font-weight: bold"></i>
                                </button>
                                <div class="collapse" id="security">
                                    <div class="container">
                                        <h4>Set security questions to restore account if you forget password</h4>
                                        <form action="../model/updateSecurityAnswers.php" method="post">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <label>First Answer</label>
                                                    <div class="form-group ">
                                                        <input type="text" value="" name="answer1" class="form-control"
                                                               placeholder="What is your father name?">
                                                    </div>
                                                    <label>Second Answer</label>
                                                    <div class="form-group ">
                                                        <input type="text" value="" name="answer2" class="form-control"
                                                               placeholder="What is your best color?">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button name="submit" type="submit"
                                                            class="btn btn-primary text-uppercase">
                                                        Update
                                                        Password
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><?php } ?>
                    <script>


                    </script>
                </div>
            </div>
        </div>
    </div>
<?php include "IncludesParts/footer.php" ?>