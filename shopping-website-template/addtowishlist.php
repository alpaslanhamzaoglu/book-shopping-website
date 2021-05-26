<?php 
include "../admin/config.php";

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$bID = $params['bID'];
$uID = $params['uID'];

$sql_statement = "INSERT INTO `wishlist`(`uID`, `bID`) VALUES (" . $uID . " , " . $bID .")";
$result = mysqli_query($db, $sql_statement) or die(mysqli_error($db));
header ("Location: ../shopping-website-template/product-details.php?book=" . $bID);


?>