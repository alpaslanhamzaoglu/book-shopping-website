<?php 

include "config.php";

if ($_POST["button"] == "add") {
    if (isset($_POST['aID']) && isset($_POST['authorName']) && isset($_POST['authorSurname']) && isset($_POST['authorNationality']) && isset($_POST['authorBirthday'])) {
        $id = $_POST['aID'];
        $name = $_POST['authorName'];
        $surname = $_POST['authorSurname'];
        $nationality = $_POST['authorNationality'];
        $birthday = $_POST['authorBirthday'];

        $sql_statement = "INSERT INTO authors(aID, aname, asurname, anationalty, abirthday) VALUES('$id', '$name', '$surname', '$nationality', '$birthday')";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: admin.php");
        die();
    }
    else
    {
        echo "The form is not set.";
    }
}

else if ($_POST["button"] == "search"){
    if (isset($_POST['aID']) && isset($_POST['authorName']) && isset($_POST['authorSurname']) && isset($_POST['authorNationality']) && isset($_POST['authorBirthday'])) { 
        
        $sql_statement = "SELECT * FROM authors WHERE ";
        if (!empty($_POST['aID'])) {
            $sql_statement = $sql_statement . " aID = " . "'" . $_POST['aID'] . "'";
        }
        if (!empty($_POST['authorName'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " aname = " . $_POST['authorName'];
        }
        if (!empty($_POST['authorSurname'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " asurname = " . "'" . $_POST['authorSurname'] . "'";
        }
        
        if (!empty($_POST['authorNationality'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " anationality = " . "'" . $_POST['authorNationality'] . "'";
        }
        if (!empty($_POST['authorBirthday'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " abirthday = " . "'" . $_POST['authorBirthday'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM authors";
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
                <th scope=“col”>ID</th>
                <th scope=“col”>Name</th>
                <th scope=“col”>Surname</th>
                <th scope=“col”>Nationality</th>
                <th scope=“col”>Birthday</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        
                        $result = mysqli_query($db, $sql_statement);
                        if (mysqli_num_rows($result) == 0) {
                            header ("Location: noResults.html");
                        }
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['aID'];
                            $name = $row['authorName'];
                            $surname = $row['authorSurname'];
                            $nationality = $row['authorNationality'];
                            $birthday = $row['authorBirthday'];

                            echo "<tr>";
                            echo "<th scope=“row”> $id </th>";
                            echo "<td> $name </td>";
                            echo "<td> $surname </td>";
                            echo "<td> $nationality </td>";
                            echo "<td> $birthday </td>";
                            echo "<tr/>";
                        }  
                    ?>
                </tbody>
         </table>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>