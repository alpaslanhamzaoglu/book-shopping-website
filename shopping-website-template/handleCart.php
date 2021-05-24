<?php
    include '../admin/config.php';
    
    if(!empty($_POST['amount']))
    {
        $bID = $_POST['button'];
        $uID = 40;
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
        header ("Location: products.php");
    }
    else
    {
        header ("Location: product-details.php?book=$bID.php");
    }
?>