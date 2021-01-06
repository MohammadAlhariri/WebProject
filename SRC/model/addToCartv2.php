<?php
session_start();
require_once("../dataSources/config/connectWithRemoteDB.php");
$connect = new DbConnection();
$userID = $_SESSION['userID'];
$productID = addslashes(strip_tags($_POST['productID']));
$quantity = addslashes(strip_tags($_POST['quantity']));
$lastOrder = getLastOrder($userID);

// if shipped and valid add new order
if ($lastOrder == null) {
    addNewOrder($userID, $productID, $quantity);
    $orderID = getOrderId($userID);
    insertToOrderContent($orderID, $productID, $quantity);
    header("Location: ../Pages/index.php?oid=$orderID");
} else if ($lastOrder["adminApproved"] == "Yes") {

//    add new order and add first product to it
    addNewOrder($userID, $productID, $quantity);
    $orderID = getLastOrder($userID);
    $id = $orderID["orderID"];
    insertToOrderContent($id, $productID, $quantity);
    header("Location: ../Pages/index.php?oid=$id");

} else {

    $orderID = getLastOrder($userID);
    $id = $orderID["orderID"];
    insertToOrderContent($id, $productID, $quantity);
    header("Location: ../Pages/index.php?var=$id");

}

// addNewOrder
function addNewOrder($userID)
{
    $connect = new DbConnection();
    /*    $total = getOrderTotalPrice($orderID);
    $totalPrice = $total['total'];*/
    $addOrder = "INSERT INTO `order`(`orderDate`, `userID`,`orderState`, `adminApproved`) 
                 VALUES (NOW(),'$userID','Not Shipped', 'No');"; // Check done
    mysqli_query($connect->getdbconnect(), $addOrder);
    echo mysqli_error($connect->getdbconnect());
    header("Location: ../Pages/index.php");
}

// insertToOrderContent
function insertToOrderContent($orderID, $productID, $quantity)
{
    $connect = new DbConnection();
    $price = getProductPrice($productID);
    $price = $price * $quantity;
    $sql = "INSERT INTO `order_content`(`orderID`, `productID`, `quantity`, `price`)
     VALUES ('$orderID','$productID','$quantity','$price');";
    mysqli_query($connect->getdbconnect(), $sql);
    getOrderTotalPrice("$orderID");
    echo mysqli_error($connect->getdbconnect());
    echo "Record Added";
}

// get orderID for new Order by userID that been created in addNewOrder
function getLastOrder($userID)
{
    $connect = new DbConnection();
    $sql1 = "SELECT * FROM `order` WHERE userID='$userID' order by `orderID` DESC limit 1 ";
    $result = mysqli_query($connect->getdbconnect(), $sql1);
    $row = mysqli_fetch_array($result);
    return $row;
}

// getProductsByOrder
function getProductsByOrder()
{
    $orderID = getLastOrderByUserID();
    $connect = new DbConnection();
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

function getProductPrice($productID)
{
    $connect = new DbConnection();
    $sql = "SELECT productPrice
            FROM product
            WHERE productID = '$productID'";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    return $row['productPrice'];
}

// getOrderTotalPrice
function getOrderTotalPrice($orderID)
{
    $connect = new DbConnection();
    $sql = "SELECT SUM(price) as 'total'
                   FROM order_content
                   WHERE orderID = $orderID;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];
    $sql = "UPDATE `order`
            SET orderTotal = '$total'
            WHERE orderID = '$orderID';";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
}

/* getLastOrderState
 this function must return orderState[isValid, isShipped, orderId]
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
}*/ // getLastOrderState

/*function getOrderIDForUser($userID)
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

} */ // getOrderIDForUser

/*getLastOrderByUserID
 this function must return last order ID
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
}*/ // getLastOrderByUserID

/*function getOrderId($userID)
{
    $connect = new DbConnection();
    $sql1 = "SELECT * FROM `order` WHERE userID=$userID  AND orderState='Not Shipped';";
    $result = mysqli_query($connect->getdbconnect(), $sql1);
    $row = mysqli_fetch_array($result);
    return $row["orderID"];
}*/ // getOrderId