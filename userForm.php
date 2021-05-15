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
            die();
        }

        else if (!empty($_POST['adminSince']) && empty($_POST['modSince'])) {
            //$mysqltime = date('Y-m-d',strototime($_POST['adminSince']));
            $date = $_POST['adminSince'];
            $sql_statement = "INSERT INTO users(upassword, email, uID, name, surname) VALUES('$password', '$email', '$id', '$name', '$surname')";
            $result1 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            $sql_statement = "INSERT INTO `admin`(`uID`, `since`) VALUES ('$id','$date')";
            $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            header ("Location: admin.php");
            die();
            
        }

        else if (!empty($_POST['modSince']) && empty($_POST['adminSince'])) {
            //$mysqltime = date('Y-m-d',strototime($_POST['adminSince']));
            $date = $_POST['modSince'];
            $sql_statement = "INSERT INTO users(upassword, email, uID, name, surname) VALUES('$password', '$email', '$id', '$name', '$surname')";
            $result1 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            $sql_statement = "INSERT INTO `moderators`(`uID`, `since`) VALUES ('$id','$date')";
            $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            header ("Location: admin.php");
            die();
            
        }
        else {

            $date = $_POST['modSince'];
            $sql_statement = "INSERT INTO users(upassword, email, uID, name, surname) VALUES('$password', '$email', '$id', '$name', '$surname')";
            $result1 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
            $sql_statement = "INSERT INTO `moderators`(`uID`, `since`) VALUES ('$id','$date')";
            $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));

            $date = $_POST['adminSince'];
            $sql_statement = "INSERT INTO `admin`(`uID`, `since`) VALUES ('$id','$date')";
            $result2 = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));

            header ("Location: admin.php");
            die();
        }
    }

    else
    {
        echo "The form is not set.";
    }
}

else {
    if (isset($_POST['password']) && isset($_POST['userName']) && isset($_POST['userSurname']) && isset($_POST['uID']) && isset($_POST['userEmail'])) { 
        
        $sql_statement = "SELECT * FROM users WHERE ";
        if (!empty($_POST['userName'])) {
            $sql_statement = $sql_statement . " name = " . "'" . $_POST['userName'] . "'";
        }
        if (!empty($_POST['userSurname'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " surname = " . "'" . $_POST['userSurname'] . "'";
        }
        if (!empty($_POST['uID'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " uID = " . $_POST['uID'];
        }
        if (!empty($_POST['userEmail'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " email = " . "'" . $_POST['userEmail'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM users";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 class="text-center"> Search Results </h1>
<br><br>
    <div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>id</th>
                <th scope=“col”>name</th>
                <th scope=“col”>surname</th>
                <th scope=“col”>email</th>
                <th scope=“col”>user type</th>
                <th scope=“col”>since</th>
                <th scope=“col”>password</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        
                        $result = mysqli_query($db, $sql_statement);
                        if (mysqli_num_rows($result) == 0) {
                            header ("Location: noResults.php");
                            die();
                        }
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['uID'];
                            $email = $row['email'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            $password = $row['upassword'];

                            $check_statement = "SELECT since FROM moderators WHERE uID ='" . $id . "'";
                            $is_moderator = mysqli_query($db, $check_statement);
                            $since = mysqli_fetch_assoc($is_moderator);
                            $date = "not admin / mod";
                            if (is_null($since['since']))
                            {
                                $check_statement = "SELECT since FROM admin WHERE uID ='" . $id . "'";
                                $is_admin = mysqli_query($db, $check_statement);
                                $since = mysqli_fetch_assoc($is_admin);
                                if (is_null($since['since'])) {
                                    $user_type = "normal";
                                }
                                else {
                                    $user_type = "admin";
                                    $date = $since['since'];
                                }
                            }
                            else {
                                $date = $since['since'];
                                $check_statement = "SELECT since FROM admin WHERE uID ='" . $id . "'";
                                $is_admin = mysqli_query($db, $check_statement);
                                $since = mysqli_fetch_assoc($is_admin);
                                
                                if (is_null($since['since'])) {
                                    $user_type = "mod";
                                }
                                else {
                                    $user_type = "admin and mod";
                                    $date = $date . " (mod) - " . $since['since'] . " (admin)";
                                }
                            }

                            echo "<tr>";
                            echo "<th scope=“row”> $id </th>";
                            echo "<td> $name </td>";
                            echo "<td> $surname </td>";
                            echo "<td> $email </td>";
                            echo "<td> $user_type </td>";
                                echo "<td> $date </td>";
                            echo "<td> $password </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
            
        </table>
        
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>