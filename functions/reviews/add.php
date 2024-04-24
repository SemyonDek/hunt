<?php
session_start();
require_once('../../config/connect.php');

$iduser = $_SESSION['accountId'];
$prodid = $_POST['prodid'];
$date = date('d.m.Y') . ' г.';
$commtext =  $_POST['comm'];

$usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$iduser'");
$usersData = mysqli_fetch_assoc($usersData);

$name = $usersData['SURNAME'] . ' ' . $usersData['NAME'];

mysqli_query($ConnectDatabase, "INSERT INTO `review` 
(`ID`, `IDPROD`, `USER`, `DATE`, `COMM`) VALUES 
(NULL, '$prodid', '$name', '$date', '$commtext')");


require_once('../../config/review.php');
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);

$countReviews = mysqli_query($ConnectDatabase, "SELECT * FROM `review` WHERE IDPROD = '$prodid'");
$countReviews = mysqli_fetch_all($countReviews, MYSQLI_ASSOC);
$countReviews = count($countReviews);
?>

<div id="rewiews-list-block" class="review-block">
    <?php
    addReviewsUser($reviews, $prodid);
    ?>
</div>

<span id="countReviews" class="hint reviews-count" itemprop="reviewCount"><?= $countReviews ?></span>