<?php
require_once('../../config/connect.php');

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

mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `CATID`, `NAME`, `CODE`, `PRICE`, `SALE`, `FINALPRICE`, `BRAND`, `COUNTRY`, `MATERIAL`, `LENGTH`, `WEIGHT`, `COLOR`, `TEXT`) VALUES 
(NULL, '$catid', '$name', '$code', '$price', '$sale', '$finalprice', '$brand', '$country', '$material', '$length', '$weight', '$color', '$desc')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

echo $idProd;
