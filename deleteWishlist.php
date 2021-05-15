<?php
    include "config.php";
    if(!empty($_POST["uIDbID"])) {
        $selected = explode("-",$_POST["uIDbID"]);
        $selectedUser = $selected[0];
        $selectedBook = $selected[1];
        $sql_statement = "DELETE FROM wishlist WHERE uID ='" . $selectedUser ."'". " AND " ."bID ='".$selectedBook. "'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: admin.php");
    } else {
        header ("Location: admin.php");
    }