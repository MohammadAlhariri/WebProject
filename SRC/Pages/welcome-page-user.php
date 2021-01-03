<?php
session_start();
//print_r($_SESSION);
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
                    <h1>Wellcome to our eCommerce Website</h1>
                    <div class="description">
                        <p>
                            Please Choose the <strong>"login or register forms"</strong> To Enter to our website.

                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Login to our site</h3>
                                <p>Enter Phone and password to log on:<br>
                                    <?php if (isset($_GET["msg"])) {
                                        if ($_GET["msg"] == 1) {
                                            echo "<span class='btn-outline-danger' style='font-size:20px;'>Wrong Password</span>";
                                        } else {
                                            echo "<span class='btn-outline-danger' style='font-size:20px;'>No User Found</span>";
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
                            <form role="form" action="../dataSources/config/login.php" method="post"
                                  class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-phone">Username</label>
                                    <input type="number" name="form-phone" placeholder="Phone..."
                                           class="form-phone form-control" id="form-phone" minlength="2">
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
                                        <i class="fa fa-smile-o"></i></a></p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>

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
                            <form role="form" action="../dataSources/config/register.php" method="post"
                                  class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">First name</label>
                                    <input type="text" name="form-first-name" placeholder="First name..."
                                           class="form-first-name form-control" id="form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Last name</label>
                                    <input type="text" name="form-last-name" placeholder="Last name..."
                                           class="form-last-name form-control" id="form-last-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="text" name="form-password" placeholder="Password..."
                                           class="form-password form-control" id="form-password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-phone">Phone</label>
                                    <input type="number" name="form-phone" placeholder="Phone..."
                                           class="form-phone form-control" id="form-phone" minlength="2">
                                </div>
                                <button type="submit" class="btn">Sign me up!</button>
                            </form>
                        </div>
                    </div>
                    <p style="margin-top: 5px">Want to be a seller, <a href="welcome-page-seller.php">Click here ...</a>
                    </p>
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
