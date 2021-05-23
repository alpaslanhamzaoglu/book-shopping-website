<?php 

include "../config.php";

if ($_POST["button"] == "add") {
    if (isset($_POST['aID']) && isset($_POST['bID'])) {
        $aid = $_POST['aID'];
        $bid = $_POST['bID'];

        $sql_statement = "INSERT INTO wrote(aID, bID) VALUES('$aid', '$bid')";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: ../admin.php");
        die();
    }

    else
    {
        echo "The form is not set.";
    }
}

else if ($_POST["button"] == "search") {
    if (isset($_POST['aID']) && isset($_POST['bID'])) { 

        $sql_statement = "SELECT * FROM wrote WHERE ";

        if (!($_POST['bID'] == "Select")) {
            $sql_statement = $sql_statement . " bID = " . "'" . $_POST['bID'] . "'";
        }
        if (!($_POST['aID'] == "Select")) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " aID = " . "'" . $_POST['aID'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM wrote";
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
        <a href="http://localhost/cs306-project-step-4/admin/admin.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go Back</a>                      
        <h1 class="text-center"> Search Results </h1>
        <br><br>
        <div class="container">  
            <table class="table">
                <thead>
                    <th scope=“col”>aID</th>
                    <th scope=“col”>bID</th>
                </thead>
                <tbody>
                    <?php                     
                        include "../config.php";
                        
                        $result = mysqli_query($db, $sql_statement);
                        if (mysqli_num_rows($result) == 0) {
                            header ("Location: ../noResults.html");
                            die();
                        }
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $aid = $row['aID'];
                            $bid = $row['bID'];

                            echo "<tr>";
                            echo "<th scope=“row”> $aid </th>";
                            echo "<td> $bid </td>";
                            echo "<tr/>";
                        }                    
                    ?>                  
                </tbody>            
            </table>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>