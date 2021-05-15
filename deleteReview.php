<?php
    include "config.php";
    
    if(!empty($_POST['rcomment'])) {
        $selected = $_POST['rcomment'];
        $sql_statement = "DELETE FROM review WHERE rcomment ='" . $selected . "'";
        echo  $sql_statement;
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        
    } 
    header ("Location: admin.php");
    

?>