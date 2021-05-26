<?php
include "../admin/config.php";
if (isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql_statement = "INSERT INTO users(upassword, email, name, surname) VALUES('$password', '$email', '$name', '$surname')";
    $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
    header ("Location: login2.php");
}

?>