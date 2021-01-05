<?php
session_start();
require_once("../dataSources/config/connectWithRemoteDB.php");
$connect = new DbConnection();
$userID = $_SESSION['userID'];
$productID = addslashes(strip_tags($_POST['productID']));
$price = addslashes(strip_tags($_POST['price']));
$quantity = addslashes(strip_tags($_POST['quantity']));
$orderState = getLastOrderState();
$lastOrder=getLastOrder($userID);
if ($orderState != null) {
    $isShipped = $orderState['isValid'];
    $isValid = $orderState['isShipped'];
    $orderID = $orderState['orderID'];
}


// if shipped and valid add new order
if ($lastOrder == null || (empty($lastOrder))) {
    addNewOrder($userID, $productID, $quantity, $price);
    $orderID = getOrderId($userID);
    insertToOrderContent($orderID, $productID, $quantity, $price);
    header("Location: ../Pages/index.php?oid=$orderID");
}
else if (($lastOrder['orderState']=="Shipped" && $lastOrder["adminApproved"]=="Yes")
    || ($lastOrder['orderState']=="Not Shipped" && $lastOrder["adminApproved"]=="Yes")) {
//    add new order and add first product to it
    addNewOrder($userID, $productID, $quantity, $price);
    $orderID = getOrderId($userID);
    insertToOrderContent($orderID, $productID, $quantity, $price);
    header("Location: ../Pages/index.php?oid=$orderID");

} else /*if (($orderState['isValid']) && (!$orderState['isShipped']))*/ {

    $orderID = getOrderId($userID);
    insertToOrderContent($orderID, $productID, $quantity, $price);
    header("Location: ../Pages/index.php?var=$orderID");

}
// else {
//
//    addNewOrder($userID, $productID, $quantity, $price);
//    $orderID = getOrderId($userID);
//    insertToOrderContent($orderID, $productID, $quantity, $price);
//    $ISVALID = $orderState['isValid'];
//    $OrderID = $orderState['orderID'];
//    header("Location: ../Pages/index.php?var=$ISVALID");
//}

//    if not shipped and valid
//    get Order ID that not shipped and valid
//    add new product to the order contact
//    update Order state make it not valid

// addNewOrder
// this fn must celled one time to create new order by
// taking userID, productID, quantity, price, totalPrice
// after create new order, fn will cell insertToOrderContent to add new product for this order
// take updated total Price for order
function addNewOrder($userID)
{
    $connect = new DbConnection();
    //$total = getOrderTotalPrice($orderID);
    //$totalPrice = $total['total'];
    $addOrder = "INSERT INTO `order`(`orderDate`, `userID`, `orderTotal`, `orderState`, `adminApproved`) 
                 VALUES (NOW(),'$userID','1234','Not Shipped', 'No');"; // Check done
    mysqli_query($connect->getdbconnect(), $addOrder);
    echo mysqli_error($connect->getdbconnect());
    header("Location: ../Pages/index.php");
}


// insertToOrderContent
// take product parameters and add it to order content where orderID
/*function insertToOrderContent($orderID, $productID, $quantity, $price)
{
    $connect = new DbConnection();
    $sql = "INSERT INTO `order_content`(`orderID`, `productID`, `quantity`, `price`)
            VALUES ('$orderID', '$productID', '$quantity', '$price');    "; //  Check again

    mysqli_query($connect->getdbconnect(), $sql);

}
*/ //old


function insertToOrderContent($userID, $productID, $quantity, $price)
{
    $connect = new DbConnection();
    $sql2 = "INSERT INTO `order_content`(`orderID`, `productID`, `quantity`, `price`)
     VALUES ('$userID','$productID','$quantity','$price');";
    mysqli_query($connect->getdbconnect(), $sql2);
    echo mysqli_error($connect->getdbconnect());
    echo "Record Added";
}

// get orderID for new Order by userID that been created in addNewOrder
// this function take user ID and return last order id for order that not valid nor shipped
function getOrderIDForUser($userID)
{
    $connect = new DbConnection();
    $sql = "SELECT * FROM `order` 
             WHERE userID='$userID'  
             AND adminApproved ='Not Valid'
             AND orderState ='Not Shipped';"; // Check done
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    if (empty($row)) {
        return null;
    }
    return $row["orderID"];

}

function getOrderId($userID)
{
    $connect = new DbConnection();
    $sql1 = "SELECT * FROM `order` WHERE userID=$userID  AND orderState='Not Shipped';";
    $result = mysqli_query($connect->getdbconnect(), $sql1);
    $row = mysqli_fetch_array($result);
    return $row["orderID"];
}
function getLastOrder($userID)
{
    $connect = new DbConnection();
    $sql1 = "SELECT * FROM `order` WHERE userID='$userID' order by `orderID` DESC limit 1";
    $result = mysqli_query($connect->getdbconnect(), $sql1);
    $row = mysqli_fetch_array($result);
    return $row;
}

// getProductsByOrder
// this function must return content products table of order
function getProductsByOrder()
{
    $orderID = getLastOrderByUserID();
    $connect = new DbConnection();
    /*    $sql = "SELECT `product`.*,`order`.`orderTotal`,`order_content`.`quantity`,`order_content`.`price` ,`order`.orderID
                    FROM `product`,`order`,`order_content`
                    WHERE `product`.`productID`=`order_content`.`productID`
                    AND `order_content`.orderID=`order`.orderID
                    AND `order`.`orderID`='$orderID'
                    AND `order_content`.`orderID`='$orderID';";*/ // should be modified

    $sql = "SELECT `order_content`.*, product.*, `order`.orderTotal
            FROM `order_content`,
                 `product`,
                 `order`
            WHERE `order_content`.orderID = `order_content`.orderID
              AND `order_content`.orderID = '$orderID'
              AND `order`.orderID = '$orderID'
              AND product.productID = `order_content`.productID;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    return $result;
}

//getLastOrderByUserID
// this function must return last order ID
function getLastOrderByUserID()
{
    $userID = $_SESSION["userID"];
    $connect = new DbConnection();
    $sql = "SELECT `orderID` 
                FROM `order` where `userID` = '$userID' 
                AND `orderState` = 'Not Shipped' 
                AND `adminApproved` = 'No' 
                ORDER BY `orderID` DESC LIMIT 1;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);

    return $row["orderID"];
}

// getLastOrderState
// this function must return orderState[isValid, isShipped, orderId]
function getLastOrderState()
{
    $userID = $_SESSION["userID"];
    $connect = new DbConnection();
    $sql = "SELECT `orderID`, `orderState`,`adminApproved`
            FROM `order`
            where `userID` = '$userID'
            ORDER BY `orderID` DESC
            LIMIT 1;"; // Check done
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    if (empty($row))
        return null;

    $orderState['isShipped'] = $row["orderState"] == "Not Shipped";
    $orderState['isValid'] = $row["adminApproved"] == "Not Valid";
    $ISVALID = $orderState['isValid'];
    $OrderID = $orderState['orderID'] = $row["orderID"];
    header("Location: ../Pages/index.php?var=$ISVALID");

    return $orderState;
}

// getOrderTotalPrice
// take order ID and modify order Total price
function getOrderTotalPrice($orderID)
{
    $connect = new DbConnection();
    $sql = "SELECT SUM(order_content.quantity * order_content.price) as 'total'
               FROM order_content
               WHERE orderID = $orderID;";

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];
    return $total($total);
}