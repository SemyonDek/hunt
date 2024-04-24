<?php
require_once('connect.php');
$infosite = mysqli_query($ConnectDatabase, "SELECT * FROM `info-site` WHERE ID = '1'");
$infosite = mysqli_fetch_assoc($infosite);
