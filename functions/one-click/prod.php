<?php
require_once('../../config/connect.php');
session_start();

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
} else {
    $idAccount = 0;
}

$prodid = $_POST['prodid'];
$name = $_POST['username'];
$number = $_POST['usernumber'];
$mail = $_POST['usermail'];

$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);

$nameProd = $productitem['NAME'];
$amount = $productitem['FINALPRICE'];

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `USERID`, `ONECLICK`, `AMOUNT`, `SALE`, `FINALAMOUNT`, `FIO`, `NUMBER`, `EMAIL`, `ADDRESS`, `STATUS`) VALUES 
    (NULL, '$idAccount', '1', '$amount', '0', '$amount', '$name', '$number', '$mail', '', '1')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

mysqli_query($ConnectDatabase, "INSERT INTO `order_item` 
    (`IDORDER`, `NAME`, `PRICE`, `VALUE`, `AMOUNT`) VALUES 
    ('$idOrder', '$nameProd', '$amount', '1', '$amount')");
