<?php
    include "config.php";
    if(!empty($_POST['bID'])) {
        $selected = $_POST['bID'];
        $sql_statement = "DELETE FROM books WHERE bID ='" . $selected . "'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: admin.php");
    } else {
        header ("Location: admin.php");
    }
    

?>