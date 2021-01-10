<?phpsession_start();if (empty($_SESSION)) {    header("Location: welcome-page-user.php");} ?><!DOCTYPE html><html lang="en"><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <meta name="description" content="">    <meta name="author" content="">    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    <title>Pixie Template - Contact</title>    <link rel="stylesheet" href="assets/css/fontawesome.css">    <link rel="stylesheet" href="assets/css/tooplate-main.css">    <link rel="stylesheet" href="assets/css/owl.css">    <link rel="stylesheet" href="assets/css/flex-slider.css">    <link rel="stylesheet" href="assets/css/styleEdited.css">    <link rel="stylesheet" href="assets/css/card.css">    <link rel="stylesheet" href="assets/css/animation/animation.css">    <link rel="stylesheet" href="assets/css/animation/library/dist/aos.css"></head><body><!-- Navigation --><nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">    <a class="navbar-brand" href="#"><img src="assets\Untitled-1.png" width="250px" alt=""></a>    <div class="container">        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">            <span class="navbar-toggler-icon"></span>        </button>        <div class="collapse navbar-collapse" id="navbarResponsive">            <ul class="navbar-nav ml-auto">                <!--customizable for user  -->                <?php if ($_SESSION["parent"] == "Users") { ?>                    <li class="nav-item ">                        <a class="nav-link" href="index.php">Home</a>                    </li>                    <li class="nav-item ">                        <a class="nav-link" href="products.php">Products</a>                    </li>                    <li class="nav-item ">                        <a class="nav-link" href="my-cart.php">My Cart</a>                    </li>                    <li class="nav-item ">                        <a class="nav-link" href="user-orders.php">My Order</a>                    </li>                    <li class="nav-item">                        <a class="nav-link " href="about.php">About Us</a>                    </li>                    <li class="nav-item cover">                        <a class="nav-link" href="contact.php">Contact Us</a>                    </li>                <?php } ?>                </li>                <li class="nav-item active">                    <a class="nav-link" href="feedbacks.php">FeedBacks</a>                </li>                <?php if ($_SESSION["parent"] == "Admins") { ?>                    <!--                    <li class="nav-item active">                                            <a class="nav-link" href="index.php">Home</a>                                        <li class="nav-item">                                            <a class="nav-link" href="products.php">Products</a>                                        </li>-->                    <li class="nav-item ">                        <a class="nav-link" href="admin-approve-products.php">Approve product</a>                    </li>                    <li class="nav-item ">                        <a class="nav-link" href="admin-approve-orders.php">Approve Order</a>                    </li>                <?php } ?>                <?php if ($_SESSION["parent"] == "seller") { ?>                    <li class="nav-item">                        <a class="nav-link" href="seller-products.php">My Product</a>                    </li>                    <li class="nav-item">                        <a class="nav-link" href="add-product-seller.php">Add Product</a>                    </li>                    <li class="nav-item">                        <a class="nav-link " href="about.php">About Us</a>                    </li>                    <li class="nav-item cover">                        <a class="nav-link" href="contact.php">Contact Us</a>                    </li>                <?php } ?>                <!--dropdown menu-->                <?php if ($_SESSION["parent"] == "seller") { ?>                <li class="nav-item dropdown">                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        Seller Profile                    </a>                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                        <a class="dropdown-item" <b                                style=" color: cornflowerblue; font-size: 24px; text-align: center; border-style: groove; border-radius: 5px;">                            <?php echo $_SESSION["sellerName"] ?></b></a>                        <a class="dropdown-item" href="seller-products.php">My Store</a>                        <a class="dropdown-item" href="#">My shipment</a>                        <a class="dropdown-item" href="setting.php">My Setting </a>                        <div class="dropdown-divider"></div>                        <a class="nav-link" href="../model/logout.php">Logout</a>                    </div>                    <?php } elseif ($_SESSION["parent"] == "Users") { ?>                <li class="nav-item dropdown">                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        My Profile                    </a>                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                        <a class="dropdown-item" <b                                style=" color: cornflowerblue; font-size: 24px; text-align: center; border-style: groove; border-radius: 5px;">                            <?php echo $_SESSION["userName"] ?></b></a>                        <a class="dropdown-item" href="my-cart.php">My Cart</a>                        <a class="dropdown-item" href="user-orders.php">My Order</a>                        <a class="dropdown-item" href="setting.php">My Setting</a>                        <div class="dropdown-divider"></div>                        <a class="nav-link" href="../model/logout.php">Logout</a>                    </div>                    <?php } else { ?>                    <!--for another-->                <li class="nav-item dropdown">                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        My Profile                    </a>                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                        <a class="dropdown-item" <b                                style=" color: cornflowerblue; font-size: 24px; text-align: center; border-style: groove; border-radius: 5px;">                            <?php echo $_SESSION["userName"] ?></b></a>                        <div class="dropdown-divider"></div>                        <a class="dropdown-item" href="setting.php">My Setting</a>                        <a class="nav-link" href="../model/logout.php">Logout</a>                    </div>                    <?php } ?>                </li>            </ul>        </div>    </div></nav>