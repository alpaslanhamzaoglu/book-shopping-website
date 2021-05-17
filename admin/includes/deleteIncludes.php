<?php
    include "../config.php";
    if(!empty($_POST["uIDbIDpID"])) {
        $selected = explode("-",$_POST["uIDbIDpID"]);
        $selectedUser = $selected[0];
        $selectedBook = $selected[1];
        $selectedPurchase = $selected[2];
        $sql_statement1 = "DELETE FROM includes_r1 WHERE bID ='" . $selectedBook ."'". " AND " ."pID ='".$selectedPurchase. "'";
        $sql_statement2 = "DELETE FROM includes_r2 WHERE uID ='" . $selectedUser ."'". " AND " ."pID ='".$selectedPurchase. "'";
        $result1 = mysqli_query($db, $sql_statement1)  or die(mysqli_error($db));
        $result2 = mysqli_query($db, $sql_statement2)  or die(mysqli_error($db));
        header ("Location: ../admin.php");
    } else {
        header ("Location: ../admin.php");
    }