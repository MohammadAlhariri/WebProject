<?php

include "IncludesParts/header.php";
include "../model/getPreviousOrdersOfUser.php";
include "../model/getOrderProductsByOrderID.php";
$uid = $_SESSION["userID"];
$orders = getOrdersByUserID($uid);
?>

<div class="container p-3" style=" height: 500px">
    <div class="container">
        <h4 class="row p-2" style="color: #e2622b ;border-radius: 10px;box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16) ;">
            <div class="col-12 col-md-2">Date</div><!--   Date-->
            <div class="col-12  col-md-2">Name</div><!--   name-->
            <div class="col-12 col-md-2">Phone</div><!--   phone-->
            <div class="col-12 col-md-2">Total</div><!--   -->
            <div class="col-12 col-md-3">Address</div>
            <div class="col-12 col-md-1">show</div>
        </h4>
    </div>
    <div id="accordion">
        <?php while ($row = mysqli_fetch_array($orders)) { ?>
            <div class="card">
                <div class="card-header" id="heading<?php echo $row["orderID"]; ?>">

                    <div class="row">
                        <div class="col-12 col-md-2"><?php echo $row["orderDate"]; ?></div><!--   Date-->
                        <div class="col-12  col-md-2"><?php echo $row["customerName"]; ?></div><!--   name-->
                        <div class="col-12 col-md-2"><?php echo $row["customerPhone"]; ?></div><!--   phone-->
                        <div class="col-12 col-md-2"><?php echo $row["orderTotal"]; ?></div><!--   total-->
                        <div class="col-12 col-md-3"><?php echo $row["customerCity"] . " | " . $row["customerAddress"]; ?></div>
                        <!--   address-->
                        <div class="col-12 col-md-1">
                            <button class="btn btn-outline-primary" data-toggle="collapse" style="border-radius: 30px"
                                    data-target="#order<?php echo $row["orderID"]; ?>"
                                    aria-expanded="true"
                                    aria-controls="collapseOne">
                                <i class="fa fa-chevron-circle-down"></i>
                            </button>
                        </div>
                    </div>

                </div>


                <div id="order<?php echo $row["orderID"]; ?>" class="collapse"
                     aria-labelledby="heading<?php echo $row["orderID"]; ?>" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Name</th>
                                <th> Category</th>
                                <th> Quantity</th>
                                <th> price</th>
                            </tr>
                            </thead>
                            <tbody> <?php $res = getProductsByOrder($row["orderID"]);
                            while ($r = mysqli_fetch_array($res)) { ?>
                                <tr>

                                    <td scope="row"><?php echo $r["productName"]; ?></td>
                                    <td><?php echo $r["productCategory"]; ?></td>
                                    <td><?php echo $r["quantity"]; ?></td>
                                    <td><?php echo $r["productPrice"]; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</div>

<?php include "IncludesParts/footer.php"; ?>
