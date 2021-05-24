<?php

include '../admin/config.php';

if(!empty($_POST['address']))
{
    $bID = $_POST['button'];
    $uID = 1;
    $address = $_POST['address'];
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url = index.html" />
    <title>Congratulations</title>
</head>
<body>
    <div>
        <p>Thank you for the shipping. We are directing to you home page.</p>
    </div>
</body>
</html>