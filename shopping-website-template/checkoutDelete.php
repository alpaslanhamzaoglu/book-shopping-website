<?php

include '../admin/config.php';

if(!(empty($_POST['amount'])))
{
    $uid = 40;
    //$uid = $_SESSION['uID'];
    $bid = $_POST['bid'];
    $damount = $_POST['amount'];
    $sql_statement = "SELECT * FROM shoppinglist s WHERE s.uID = '$uid' AND s.bID = '$bid'";
    $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    $amount = $row['amount'];
    $sql_statement = "DELETE FROM shoppinglist WHERE bID = '$bid' AND uID = '$uid'";
    mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    
    if (($amount - $damount) != 0) {
        $newamount = $amount - $damount;
        $sql_statement = "INSERT INTO shoppinglist(uID, bID, amount) VALUES ($uid, $bid, $newamount)";
        mysqli_query($db, $sql_statement)  or die(mysqli_error($db));        
    }
           
    header ("Location: checkout.php");
}
else
{
    header ("Location: checkout.php");
}

?>

