<?php

include "IncludesParts/header.php";
include "../model/getProductsOfLastOrder.php";
$productsOfOrder = getProductsByOrder();
$tmpOrderID = "";
?>

    <style>
        .shopping-cart {
            width: 100%;
            margin: 20px auto;
            background: #FFFFFF;
            box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
            border-radius: 6px;

            display: flex;
            flex-direction: column;
        }

        .titles {
            height: 60px;
            border-bottom: 1px solid #E1E8EE;
            padding: 20px 30px;
            color: #5E6977;
            font-size: 18px;
            font-weight: 400;
        }

        .item {
            border-top: 1px solid #E1E8EE;

            padding: 20px 30px;
            height: 150px;
            display: flex;

        }

        .item:nth-child(3) {
            border-top: 1px solid #E1E8EE;
            border-bottom: 1px solid #E1E8EE;
        }

        /* Buttons -  Delete and Like */
        .buttons {
            position: relative;
            padding-top: 30px;
            margin-right: 60px;
        }

        .delete-btn {
            display: inline-block;
            cursor: pointer;
            width: 18px;
            height: 17px;
            background: url("../Pages/assets/ico/delete-icn.svg") no-repeat center;
            margin-right: 20px;
        }

        .like-btn {
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
            position: absolute;
            top: 9px;
            left: 15px;
            display: inline-block;
            background: url('../Pages/assets/ico/twitter-heart.png');
            width: 60px;
            height: 60px;
            background-size: 2900%;
            background-repeat: no-repeat;
            cursor: pointer;
        }

        .is-active {
            animation-name: animate;
            animation-duration: .8s;
            animation-iteration-count: 1;
            animation-timing-function: steps(28);
            animation-fill-mode: forwards;
        }

        @keyframes animate {
            0% {
                background-position: left;
            }
            50% {
                background-position: right;
            }
            100% {
                background-position: right;
            }
        }

        /* Product Image */
        .image {
            margin-right: 50px;
        }

        /* Product Description */
        .description {
            padding-top: 10px;
            margin-right: 60px;
            width: 115px;
        }

        .description span {
            display: block;
            font-size: 14px;
            color: #43484D;
            font-weight: 400;
        }

        .description span:first-child {
            margin-bottom: 5px;
        }

        .description span:last-child {
            font-weight: 300;
            margin-top: 8px;
            color: #86939E;
        }

        /* Product Quantity */
        .quantity {
            padding-top: 20px;
            margin-right: 60px;
        }

        .quantity input {
            -webkit-appearance: none;
            border: none;
            text-align: center;
            width: 32px;
            font-size: 16px;
            color: #43484D;
            font-weight: 300;
        }

        button[class*=qbutton] {
            width: 30px;
            height: 30px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .minus-btn img {
            margin-bottom: 3px;
        }

        .plus-btn img {
            margin-top: 2px;
        }

        .qbutton:focus,
        input:focus {
            outline: 0;
        }

        /* Total Price */
        .total-price {
            width: 83px;
            padding-top: 27px;
            text-align: center;
            font-size: 16px;
            color: #43484D;
            font-weight: 300;
        }

        /* Responsive */
        @media (max-width: 800px) {
            .shopping-cart {
                width: 100%;
                height: auto;
                overflow: hidden;
            }

            .item {
                height: auto;
                flex-wrap: wrap;
                justify-content: center;
            }

            .image img {
                width: 50%;
            }

            .image,
            .quantity,
            .description {
                width: 100%;
                text-align: center;
                margin: 6px 0;
            }

            .buttons {
                margin-right: 20px;
            }
        }

        body > div.row > div.col-md-8 > div {
            overflow: auto;
        }

    </style>
    <div class="row" style="margin-bottom: 70px">
        <div class="col-md-8">
            <div class="container">
                <div class="shopping-cart">
                    <!-- Title -->
                    <div class="row">
                        <div class="col-md-9">
                            <div class="titles">
                                Shopping Bag
                            </div>
                        </div>
                        <div class=" title2 col-md-3  text-center text-danger "><?php echo (mysqli_fetch_array($productsOfOrder))["orderTotal"]." $";?></div>
                    </div>

                    <!-- Product #1 -->
                    <?php
                    if ($productsOfOrder != null) {
                        while ($row = mysqli_fetch_array($productsOfOrder)) {
                            ?>
                            <div class="item">

                                <div class="buttons">
                                    <a href="../model/removeProductFromOrder.php?productID=<?php echo $row["productID"]; ?>&orderID=<?php echo $row["orderID"]; ?>"><span
                                                class="delete-btn"></span></a>
                                    <?php $tmpOrderID = $row["orderID"]; ?>
                                    <!--                                    <span class="like-btn"></span>
                                    -->                                </div>

                                <div class="image">
                                    <img src="../<?php echo $row["productImage"]; ?>"
                                         alt="<?php echo $row["productName"]; ?>" width="130px" height="100%"/>
                                </div>

                                <div class="description">
                                    <span><?php echo $row["productCategory"]; ?></span>
                                    <span><?php echo $row["productName"]; ?></span>
                                </div>

                                <div class="quantity">
                                    <button class="plus-btn qbutton" type="button" name="button">
                                        <img src="../Pages/assets/ico/plus.svg" alt=""/>
                                    </button>
                                    <input type="text" name="name" value="1">
                                    <button class="minus-btn qbutton qbutton" type="button" name="button">
                                        <img src="../Pages/assets/ico/minus.svg" alt=""/>
                                    </button>
                                </div>

                                <div class="total-price">$<?php echo $row["price"]; ?></div>
                            </div>
                        <?php }
                    } ?>

                </div>
                <script src="assets/js/jquery-1.11.1.min.js"></script>
                <script type="text/javascript">
                    $('.minus-btn').on('click', function (e) {
                        e.preventDefault();
                        var $this = $(this);
                        var $input = $this.closest('div').find('input');
                        var value = parseInt($input.val());

                        if (value > 1) {
                            value = value - 1;
                        } else {
                            value = 1;
                        }

                        $input.val(value);

                    });

                    $('.plus-btn').on('click', function (e) {
                        e.preventDefault();
                        var $this = $(this);
                        var $input = $this.closest('div').find('input');
                        var value = parseInt($input.val());

                        if (value < 10) {
                            value = value + 1;
                        } else {
                            value = 10;
                        }

                        $input.val(value);
                    });

                    $('.like-btn').on('click', function () {
                        $(this).toggleClass('is-active');
                    });
                </script>
            </div>
        </div>

        <div class="col-md-4">
            <div class="container" style="overflow: auto">
                <div class="shopping-cart">
                    <div class="titles">
                        Shipping Address
                    </div>
                    <div class="container">
                        <div class="row">

                            <form method="post" action="../model/updateOrderState.php" class="col-md-11 p-2">
                                <!-- 2 column grid layout with text inputs for the first and last names -->


                                <div class="form-outline mb-4">
                                    <input type="text" id="form6Example1" class="form-control" name="name" required
                                           placeholder="Full name"/>
                                </div>


                                <div class="form-outline mb-4">
                                    <input type="number" id="form6Example2" class="form-control " name="phone" required
                                           placeholder="Phone"/>
                                </div>


                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form6Example3" class="form-control" name="city" required
                                           placeholder="City name"/>
                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form6Example4" class="form-control" name="address" required
                                           placeholder="Full Address"/>
                                </div>


                                <!-- Checkbox -->
                                <div class="form-check  mb-4">
                                    <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value=""
                                            id="c"
                                            checked required
                                    />
                                    <label class="form-check-label" for="c"> I am sure to send this data </label>
                                </div>
                                <input type="hidden" name="orderID" value="<?php echo $tmpOrderID ?>"/>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn - primary">Place order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include "IncludesParts/footer.php"; ?>