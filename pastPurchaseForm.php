<?php 

include "config.php";

if ($_POST["button"] == "add") {
    if (isset($_POST['pID']) && isset($_POST['pdate'])) {
        $pID = $_POST['pID'];
        $pdate = $_POST['pdate'];

        $sql_statement = "INSERT INTO `pastpurchases`(`pID`, `pdate`) VALUES ('$pID','$pdate')";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));

        
    }
    else
    {
        echo "The form is not set.";
    }
    header ("Location: admin.php");
    die();
}

else if ($_POST["button"] == "search") {
    if (isset($_POST['pID']) && isset($_POST['pdate'])) { 
        
        $sql_statement = "SELECT * FROM pastpurchases WHERE ";
        if (!empty($_POST['pID'])) {
            $sql_statement = $sql_statement . " pID = " . "'" . $_POST['pID'] . "'";
        }
        if (!empty($_POST['pdate'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " pdate = " . "'" . $_POST['pdate'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM pastpurchases";
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
        <a href="http://localhost/cs306-project-step-4/admin.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go Back</a>
        <h1 class="text-center">Search Results</h1>
        <hr>
        <div class="container">
            <table class="table">
                <thead>
                    <th scope=“col”>pID</th>
                    <th scope=“col”>pdate</th>
                </thead>
                <tbody>
                    <?php             
                        include "config.php";
                        
                        $result = mysqli_query($db, $sql_statement);
                        if (mysqli_num_rows($result) == 0) {
                            header ("Location: noResults.php");
                        }
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $pID = $row['pID'];
                            $pdate = $row['pdate'];
                            
                            echo "<tr>";
                            echo "<th scope=“row”> $pID </th>";
                            echo "<td> $pdate </td>";
                            echo "<tr/>";
                        }                    
                    ?>                  
                </tbody>
            </table>
            <br>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>

