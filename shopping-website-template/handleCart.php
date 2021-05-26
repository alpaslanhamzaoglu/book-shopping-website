<?php
    include '../admin/config.php';
    session_start();
    if (!isset($_SESSION['uID'])) {
        // redirect to your login page
        exit();
    }
    //$uid = $_SESSION['uID'];
    if(!empty($_POST['amount']) && $_POST['amount'] > 0)
    {
        $bID = $_POST['button'];
        $uID = $_SESSION['uID'];
        $amount = $_POST['amount'];
        $sql_statement = "SELECT * FROM shoppinglist s WHERE s.bID = '$bID' AND s.uID = '$uID'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        if(mysqli_num_rows($result) != 0)
        {
            $row = mysqli_fetch_assoc($result);
            $amount = $amount + $row['amount'];
            $sql_statement = "DELETE FROM shoppinglist WHERE bID = '$bID' AND uID = '$uID'";
            mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        }
        $sql_statement = "INSERT INTO shoppinglist(uID,bID,amount) VALUES ($uID,$bID,$amount)";
        mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: products.php?category=All");
    }
    else
    {
        header ("Location: product-details.php?book=$bID");
    }
?>