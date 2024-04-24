<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];
$parentid = $_POST['parentid'];
$namecat = $_POST['namecat'];
$textcat = $_POST['textcat'];

mysqli_query($ConnectDatabase, "UPDATE `category` SET 
    `PARENT` = '$parentid', `NAME` = '$namecat' , `TEXT` = '$textcat' WHERE `category`.`ID` = $catid");

require_once('../../config/category.php');

$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);


?>

<select name="parentid" id="parentid">
    <?php
    addSelect($category, 0, 0, $categoryitem['PARENT']);
    ?>
</select>