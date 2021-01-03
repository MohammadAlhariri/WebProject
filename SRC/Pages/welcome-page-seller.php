<?php
session_start();
print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To our Website</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Welcome to our Seller eCommerce Accounts </h1>
                    <div class="description">
                        <p>
                            Please Choose the <strong>"login or register forms for Seller"</strong> To Enter to Your
                            account.

                        </p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-5">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Sign up now</h3>
                                <p>Fill in the form below to get instant access:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="../dataSources/config/sellerRegister.php" method="post"
                                  class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-full-name">Full name</label>
                                    <input type="text" name="form-full-name" placeholder="Seller name..."
                                           class="form-full-name form-control" id="form-full-name">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="form-email" placeholder="Email..."
                                           class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-phone">Phone</label>
                                    <input type="number" name="form-phone" placeholder="Phone..."
                                           class="form-phone form-control" id="form-phone" minlength="2">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-address">Address </label>
                                    <input type="text" name="form-address" placeholder="Address..."
                                           class="form-address form-control" id="form-address">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password </label>
                                    <input type="password" name="form-password" placeholder="Password..."
                                           class="form-address form-control" id="form-password">
                                </div>
                                <button type="submit" class="btn">Sign me up!</button>
                            </form>
                        </div>
                    </div>
                    <p style="margin-top: 5px">Want to discover our products, <a href="welcome-page-user.php">Click here
                            ...</a></p>
                </div>
                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Login to our site</h3>
                                <p>Enter Email and password to log on:<br>
                                    <?php if (isset($_GET["msg"])) {
                                        if ($_GET["msg"] == 1) {
                                            echo "<span class='btn-outline-danger' style='font-size:20px;'>Wrong Password</span>";
                                        } else {
                                            echo "<span class='btn-outline-danger' style='font-size:20px;'>No Seller Found</span>";
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="../dataSources/config/sellerLogin.php" method="post"
                                  class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="email" name="form-email" placeholder="Email..."
                                           class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="form-password" placeholder="Password..."
                                           class="form-password form-control" id="form-password">
                                </div>
                                <button type="submit" class="btn">Sign in!</button>
                            </form>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row secure">
                            <div class="footer-border"></div>
                            <div class="col-sm-8 col-sm-offset-2">

                                <p>All information are secure
                                    <a>
                                        <i class="fa fa-smile-o"></i></p></a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<!-- Footer -->
<footer>

</footer>

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>