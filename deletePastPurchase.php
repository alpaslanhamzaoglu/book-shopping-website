<?php
    include "config.php";
    
    if(!empty($_POST['pID'])) {
        $selected = $_POST['pID'];
        $sql_statement = "DELETE FROM pastpurchases WHERE pID ='" . $selected . "'";
        echo  $sql_statement;
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));        
    } 
    header ("Location: admin.php");
?>