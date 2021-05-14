<?php 

include "config.php";
if (isset($_POST['password']) == FALSE) {
    echo "password problem";
}

if ($_POST["button"] == "add") {
    if (isset($_POST['password']) && isset($_POST['userName']) && isset($_POST['userSurname']) && isset($_POST['uID']) && isset($_POST['userEmail'])) {
        $name = $_POST['userName'];
        $surname = $_POST['userSurname'];
        $id = $_POST['uID'];
        $email = $_POST['userEmail'];
        $password = $_POST['password'];

        if (empty($_POST['modSince']) && empty($_POST['adminSince'])) { //this is a regular user
            $sql_statement = "INSERT INTO users(upassword, email, uID, name, surname) VALUES('$password', '$email', '$id', '$name', '$surname')";
            $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            header ("Location: admin.php");
        }

        else if (!empty($_POST['adminSince'])) {
            //$mysqltime = date('Y-m-d',strototime($_POST['adminSince']));
            $date = $_POST['adminSince'];
            $sql_statement = "INSERT INTO users(upassword, email, uID, name, surname) VALUES('$password', '$email', '$id', '$name', '$surname')";
            $result1 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            $sql_statement = "INSERT INTO `admin`(`uID`, `since`) VALUES ('$id','$date')";
            $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            header ("Location: admin.php");
            
        }

        else if (!empty($_POST['modSince'])) {
            //$mysqltime = date('Y-m-d',strototime($_POST['adminSince']));
            $date = $_POST['modSince'];
            $sql_statement = "INSERT INTO users(upassword, email, uID, name, surname) VALUES('$password', '$email', '$id', '$name', '$surname')";
            $result1 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            $sql_statement = "INSERT INTO `moderators`(`uID`, `since`) VALUES ('$id','$date')";
            $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            header ("Location: admin.php");
            
        }

        

    }

    else
    {

        echo "The form is not set.";

    }
}


?>