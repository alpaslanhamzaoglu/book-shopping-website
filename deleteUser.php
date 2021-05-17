<?php
    include "config.php";
    if(!empty($_POST['uID'])) {
        $selected = $_POST['uID'];
        $sql_statement = "DELETE FROM users WHERE uID ='" . $selected . "'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: admin.php");
    } else {
        header ("Location: admin.php");
    }
?>