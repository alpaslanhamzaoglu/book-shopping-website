<?php

include '../admin/config.php';

if(!empty($_POST['address']))
{
    $date = date('Y-m-d');

    $uid = 1;
    $total = 20;
    $address = $_POST['address'];
    //$uid = $_SESSION['uID'];
    //$total = $_SESSION['totalprice'];

    $sql_statement = "INSERT INTO pastpurchases(totalprice, pdate, paddress) VALUES ($total, $date, $address)";
    mysqli_query($db, $sql_statement)  or die(mysqli_error($db));

    $sql_statement = "SELECT * FROM pastpurchases p WHERE p.paddress = '$address' AND p.date = '$date' AND p.totalprice = '$total'";
    $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));  
    $row2 = mysqli_fetch_assoc($result2);
    $pid = $row2['pID'];
    
    $sql_statement = "SELECT * FROM shoppinglist s WHERE s.uID = '$uid'";
    $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    $result = mysqli_query($db, $sql_statement);
    while($row = mysqli_fetch_assoc($result))
    {
        $bid = $row['bID'];
        $sql_statement = "INSERT INTO includes_r1(bID, pID) VALUES ($bid, $pid)";
        mysqli_query($db, $sql_statement)  or die(mysqli_error($db));

        $sql_statement = "DELETE FROM shoppinglist WHERE bID = '$bid' AND uID = '$uid'";
        mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    }

    $sql_statement = "INSERT INTO includes_r2(pID, uID) VALUES ($pid, $uid)";
    mysqli_query($db, $sql_statement)  or die(mysqli_error($db));    
       
    header ("Location: congrats.html");
}
else
{
    header ("Location: sorry.html");
}

?>

