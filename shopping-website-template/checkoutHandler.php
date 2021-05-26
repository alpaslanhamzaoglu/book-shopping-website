<?php
session_start();
if (!isset($_SESSION['uID'])) {
    // redirect to your login page
    exit();
}
include '../admin/config.php';

if(!(empty($_POST['address'])))
{
    $mysqli = new mysqli('localhost','root','','proje');
    $date = date('Y-m-d');
    //$uid = 40;
    $total = 22.28;
    $address = $_POST['address'];
    
    
    $uid = $_SESSION['uID'];
    
    //$total = $_SESSION['totalprice'];

    $query = "INSERT INTO pastpurchases(totalprice, pdate, paddress) VALUES ($total, '$date', '$address')";
    $mysqli->query($query);
    $pid = $mysqli->insert_id;

    $sql_statement = "SELECT * FROM shoppinglist s WHERE s.uID = '$uid'";
    $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    while($row = mysqli_fetch_assoc($result))
    {
        $bid = $row['bID'];
        $sql_statement = "INSERT INTO includes_r1(pID, bID) VALUES ($pid, $bid)";
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

