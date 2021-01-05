<?php

include "IncludesParts/header.php";
include "../model/getPreviousOrdersOfUser.php";
$uid = $_SESSION["userID"];
$orders = getOrdersByUserID($uid);
?>

<div class="container">
    <div id="accordion">
        <?php while ($row=mysqli_fetch_array($orders)){ ?>
        <div class="card">
            <div class="card-header" id="heading<?php echo $row["orderID"];?>">
                <h5 class="mb-0">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-12 col-md-2"><?php echo $row["orderDate"];?></div><!--   Date-->
                        <div class="col-12  col-md-2"><?php echo $row["customerName"];?></div><!--   name-->
                        <div class="col-12 col-md-1"><?php echo $row["customerPhone"];?></div><!--   phone-->
                        <div class="col-12 col-md-2"><?php echo $row["orderTotal"];?></div><!--   total-->
                        <div class="col-12 col-md-3"><?php echo $row["customerCity"]." | ".$row["customerAddress"];?></div><!--   address-->
                        <div class="col-12 col-md-2">
                            <button class="btn btn-outline-primary" data-toggle="collapse" data-target="#order<?php echo $row["orderID"];?>"
                                    aria-expanded="false"
                                    aria-controls="collapseOne">
                                Show Products
                            </button>
                        </div>
                    </div>
                </h5>
            </div>

            <div id="order<?php echo $row["orderID"];?>" class="collapse show" aria-labelledby="heading<?php echo $row["orderID"];?>" data-parent="#accordion">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }?>


    </div>
</div>


<?php include "IncludesParts/footer.php"; ?>
