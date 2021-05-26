<?php
    session_start();
    if (!isset($_SESSION['uID'])){
        exit();
    }
    include '../admin/config.php';
    $bID = $_POST['button'];
    if(!empty($_POST['comment']))
    {
        $uID = $_SESSION['uID'];
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];
        $sql_statement = "SELECT * FROM review WHERE uID = '$uID' AND bID = '$bID'";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        if(mysqli_num_rows($result) != 0)
        {
            $row = mysqli_fetch_assoc($result);
            $sql_statement = "DELETE FROM review WHERE bID = '$bID' AND uID = '$uID'";
            mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        }
        $sql_statement = "INSERT INTO review(rating,rcomment,uID,bID) VALUES($rating,'$comment',$uID,$bID)";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    }
    header ("Location: product-details.php?book=$bID");
?>