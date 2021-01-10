<?php

include "IncludesParts/header.php";
require "../model/getOrdersNotShipped.php";
?>


<div class="container ">
    <div class="row barStyle m-2">
        <h3 class="p-2  m-1"> New Orders Needs Approve</h3></div>
    <div style="height: 430px">
        <table class="table " style="min-height: 420px">
            <thead>
            <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Total</th>
                <th scope="col">State</th>

            </tr>
            </thead>
            <tbody>

            <?php $result = getOrdersNotShipped();
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <th><?php echo $row["customerName"]; ?></th>
                    <td><?php echo $row["customerCity"] . "|" . $row["customerAddress"]; ?></td>
                    <td><?php echo $row["customerPhone"]; ?></td>
                    <td><?php echo $row["orderTotal"]; ?></td>
                    <td>
                        <div class="row">
                            <a href="../model/removeOrder.php?oid=<?php echo $row["orderID"]; ?>"
                               class="btn btn-danger mx-1">Decline</a>
                            <a href="../model/approveShippingOrder.php?oid=<?php echo $row["orderID"]; ?>"
                               class="btn btn-success mx-1">Approve</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>


<?php include "IncludesParts/footer.php"; ?>
