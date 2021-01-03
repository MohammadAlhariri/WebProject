<?phpsession_start();//print_r($_SESSION);?><!DOCTYPE html><html lang="en"><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <meta name="description" content="">    <meta name="author" content="">    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    <title>Pixie Template - Contact</title>    <link rel="stylesheet" href="assets/css/fontawesome.css">    <link rel="stylesheet" href="assets/css/tooplate-main.css">    <link rel="stylesheet" href="assets/css/owl.css">    <link rel="stylesheet" href="assets/css/flex-slider.css">    <link rel="stylesheet" href="assets/css/styleEdited.css"></head><body><!-- Navigation --><nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">    <a class="navbar-brand" href="#"><img src="assets\Untitled-1.png" width="250px" alt=""></a>    <div class="container">        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">            <span class="navbar-toggler-icon"></span>        </button>        <div class="collapse navbar-collapse" id="navbarResponsive">            <ul class="navbar-nav ml-auto">                <li class="nav-item active">                    <a class="nav-link" href="index.php">Home</a>                </li>                <?php if ($_SESSION["parent"] == "Users") { ?>                    <li class="nav-item">                        <a class="nav-link" href="products.php">Products</a>                    </li>                <?php } ?>                <?php if ($_SESSION["parent"] == "seller") { ?>                    <li class="nav-item">                        <a class="nav-link" href="seller-products.php">My Product</a>                    </li>                    <li class="nav-item">                        <a class="nav-link" href="add-product-seller.php">Add Product</a>                    </li>                <?php } ?>                <li class="nav-item">                    <a class="nav-link" href="about.php">About Us</a>                </li>                <li class="nav-item">                    <a class="nav-link" href="contact.php">Contact Us</a>                </li>                <?php if ($_SESSION["parent"] == "seller") { ?>                <li class="nav-item dropdown">                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        Seller Profile                    </a>                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                        <a class="dropdown-item" href="#">Seller Setting</a>                        <a class="dropdown-item" href="seller-products.php">My Store</a>                        <a class="dropdown-item" href="#">My shipment</a>                        <div class="dropdown-divider"></div>                        <a class="nav-link" href="../model/logout.php">Logout</a>                    </div>                    <?php } elseif ($_SESSION["parent"] == "Users") { ?>                <li class="nav-item dropdown">                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        My Profile                    </a>                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                        <a class="dropdown-item" href="#"><?php echo $_SESSION['userName'] . " Setting" ?></a>                        <a class="dropdown-item" href="#">My Cart</a>                        <a class="dropdown-item" href="#">My Order</a>                        <div class="dropdown-divider"></div>                        <a class="nav-link" href="../model/logout.php">Logout</a>                    </div>                    <?php } else { ?>                <li class="nav-item dropdown">                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        My Profile                    </a>                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                        <a class="dropdown-item" href="#"><?php echo $_SESSION['userName'] . " Admin Setting" ?></a>                        <a class="dropdown-item" href="#">Approve product</a>                        <a class="dropdown-item" href="#">Approve Order</a>                        <div class="dropdown-divider"></div>                        <a class="nav-link" href="../model/logout.php">Logout</a>                    </div>                    <?php } ?>                </li>            </ul>        </div>    </div></nav>