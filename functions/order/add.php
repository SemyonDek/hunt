<?php
require_once('../../config/connect.php');
session_start();

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
} else {
    $idAccount = 0;
}

$nameUser = $_POST['nameUser'];
$surnameUser = $_POST['surnameUser'];
$patronymicUser = $_POST['patronymicUser'];

$numberUser = $_POST['numberUser'];
$mailUser = $_POST['mailUser'];

$countryUser = $_POST['countryUser'];
$regionUser = $_POST['regionUser'];
$cityUser = $_POST['cityUser'];
$addressUser = $_POST['addressUser'];

$fio = $surnameUser . ' ' . $nameUser . ' ' . $patronymicUser;
$address = $countryUser . ' ' . $regionUser . ' ' . $cityUser . ' ' . $addressUser;

$amount = $_SESSION['basketSum'];
$sale = $_SESSION['SALE'];

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `USERID`, `ONECLICK`, `AMOUNT`, `SALE`, `FINALAMOUNT`, `FIO`, `NUMBER`, `EMAIL`, `ADDRESS`, `STATUS`) VALUES 
    (NULL, '$idAccount', '0', '$amount', '$sale', '$amount', '$fio', '$numberUser', '$mailUser', '$address', '1')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {

    $prodid = $item['ID'];
    $productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
    $productitem = mysqli_fetch_assoc($productitem);

    $value = $item['VALUE'];
    $nameProd = $productitem['NAME'];
    $price = $productitem['FINALPRICE'];
    $amountProd = $item['AMOUNT'];

    mysqli_query($ConnectDatabase, "INSERT INTO `order_item` 
    (`IDORDER`, `NAME`, `PRICE`, `VALUE`, `AMOUNT`) VALUES 
    ('$idOrder', '$nameProd', '$price', $value, '$amountProd')");
}

unset($_SESSION['basket']);
unset($_SESSION['basketSum']);
unset($_SESSION['SALE']);
