<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$catid = $_POST['catidprod'];
$name = $_POST['nameprod'];
$code = $_POST['codeprod'];
$price = $_POST['priceprod'];
$sale = $_POST['saleprod'];
$finalprice = $price * ((100 - $sale) / 100);
$brand = $_POST['brandprod'];
$country = $_POST['countryprod'];
$material = $_POST['materialprod'];
$length = $_POST['lengthprod'];
$weight = $_POST['weightprod'];
$color = $_POST['colorprod'];
$desc = $_POST['descprod'];

$newlist = $_POST['newlistprod'];
$salelist = $_POST['salelistprod'];

mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`CATID` = '$catid', `NAME` = '$name', `CODE` = '$code', `PRICE` = '$price', 
`SALE` = '$sale', `FINALPRICE` = '$finalprice', `BRAND` = '$brand', `COUNTRY` = '$country', 
`MATERIAL` = '$material', `LENGTH` = '$length', `WEIGHT` = '$weight', `COLOR` = '$color', 
`TEXT` = '$desc' WHERE `products`.`ID` = $prodid");

$newListItem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new` WHERE IDPROD = '$prodid'");
$newListItem = mysqli_fetch_assoc($newListItem);
$saleListItem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale` WHERE IDPROD = '$prodid'");
$saleListItem = mysqli_fetch_assoc($saleListItem);

if ($newlist == 1) {
    if (!isset($newListItem))
        mysqli_query($ConnectDatabase, "INSERT INTO `products_new` (`ID`, `IDPROD`) VALUES (NULL, '$prodid')");
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `products_new` WHERE `products_new`.`IDPROD` = $prodid");
}

if ($salelist == 1) {
    if (!isset($saleListItem))
        mysqli_query($ConnectDatabase, "INSERT INTO `products_sale` (`ID`, `IDPROD`) VALUES (NULL, '$prodid')");
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `products_sale` WHERE `products_sale`.`IDPROD` = $prodid");
}
