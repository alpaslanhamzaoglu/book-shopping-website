<?php
    include "config.php";
    
    if(!empty($_POST['uIDbID'])) {


    	$selected = explode("&",$_POST["uIDbID"]);
        $sUser = $selected[0];
        $sBook = $selected[1];
        $sql_statement = "DELETE FROM shoppinglist WHERE uID ='" . $sUser ."'". " AND " ."bID ='".$sBook. "'";
        echo  $sql_statement;
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        
    } 
    header ("Location: admin.php");
    

?>