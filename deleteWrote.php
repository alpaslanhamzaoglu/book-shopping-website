<?php
    include "config.php";
    
    if(!empty($_POST['abID'])) {
        $selected = explode("-",$_POST["abID"]);
        $selectedAut = $selected[0];
        $selectedBook = $selected[1];
        $sql_statement = "DELETE FROM wrote WHERE aID ='" . $selectedAut ."'". " AND " ."bID ='".$selectedBook. "'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    } 
    header ("Location: admin.php");
?>