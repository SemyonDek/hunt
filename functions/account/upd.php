<?php
session_start();
require_once('../../config/connect.php');
$nameUser = $_POST['nameUser'];
$surnameUser = $_POST['surnameUser'];
$patronymicUser = $_POST['patronymicUser'];

$numberUser = $_POST['numberUser'];
$mailUser = $_POST['mailUser'];

$countryUser = $_POST['countryUser'];
$regionUser = $_POST['regionUser'];
$cityUser = $_POST['cityUser'];
$addressUser = $_POST['addressUser'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET 
`NAME` = '$nameUser', `SURNAME` = '$surnameUser', `PATRON` = '$patronymicUser', 
`NUMBER` = '$numberUser', `MAIL` = '$mailUser', `COUNTRY` = '$countryUser', 
`REGION` = '$regionUser', `CITY` = '$cityUser', `ADDRESS` = '$addressUser' 
WHERE `users`.`ID` = $idUser");
