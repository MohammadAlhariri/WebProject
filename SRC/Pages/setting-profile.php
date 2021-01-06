<?php

include "IncludesParts/header.php";

?>
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <a id="addFile" onclick="document.getElementById('fileInput').click();"><i
                            class="fa fa-lg fa-camera"></i></a>
                    <img id="imgLogo" class="rounded-circle mt-5" src="<?php echo $_SESSION["userImage"]; ?>"
                         width="150"><span
                        class="font-weight-bold">John Doe</span><span
                        class="text-black-50">john_doe12@bbb.com</span><span>United States</span></div>
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
                        <div class="row mt-2">
                            <div class="col-md-6"><label for="name">Full Name</label></div>
                            <div class="col-md-6"><input id="name" name="name" type="text" class="form-control"
                                                         value="<?php echo $_SESSION["userName"]; ?>"
                                                         placeholder="Enter Full Name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label for="phone">Phone</label></div>
                            <div class="col-md-6"><input id="phone" name="phone" type="number" class="form-control"
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
                            <div class="col-md-6"><input id="address" name="address" type="text" class="form-control"
                                                         value="<?php echo $_SESSION["userAddress"]; ?>"
                                                         placeholder="Enter Address"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <button name="submit" type="submit" class="btn btn-primary text-uppercase">Add Product Now</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php include "IncludesParts/footer.php"; ?>