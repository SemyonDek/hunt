<?php
require_once('../../config/connect.php');
$text = $_POST['text'];

mysqli_query($ConnectDatabase, "UPDATE `info-site` SET `INFOSITE` = '$text' WHERE `info-site`.`ID` = 1");
