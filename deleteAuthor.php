<?php
    include "config.php";
    if(!empty($_POST['aID'])) {
        $selected = $_POST['aID'];
        $sql_statement = "DELETE FROM authors WHERE aID ='" . $selected . "'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: admin.php");
    } else {
        header ("Location: admin.php");
    }
    

?>