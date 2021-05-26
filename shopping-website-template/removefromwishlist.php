<?php 
include "config.php";

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$bID = $params['bID'];
$uID = $params['uID'];

$sql_statement = "DELETE FROM `wishlist` WHERE uID =" . $uID . " AND bID = " . $bID . ";";
$result = mysqli_query($db, $sql_statement);

header ("Location: ../shopping-website-template/userpage.php");


?>