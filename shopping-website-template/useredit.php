<?php
include "config.php";

$uID = $_POST['uID'];
$sql_statement = "SELECT * FROM `users` WHERE uID = " . $uID;
$result = mysqli_query($db, $sql_statement);
while($row = mysqli_fetch_assoc($result)) {

    $id = $row['uID'];
    $email = $row['email'];
    $name = $row['name'];
    $surname = $row['surname'];
    $password = $row['upassword'];


    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (!empty($_POST['surname'])) {
        $surname = $_POST['surname'];
    }
    if (!empty($_POST['upassword'])) {
        $password = $_POST['password'];
    }

    $sql_statement = "UPDATE users SET upassword=" . "'" . $password . "'" . ", email=". "'" . $email . "'" . ", name=". "'" . $name . "'" . ", surname=". "'" . $surname. "'" ." WHERE uID = " . $uID;
    echo  $sql_statement;

    echo $sql_statement;
    $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    header ("Location: ../shopping-website-template/userpage.php");
}

?>