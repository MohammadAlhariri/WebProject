<?php
function getName($sellerID)
{
    $connect2 = new DbConnection();
    $sql = "SELECT `sellerName` FROM `seller`where `sellerID` = '$sellerID';";
    $result = mysqli_query($connect2->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($connect2->getdbconnect());
    return $row["sellerName"];
}
