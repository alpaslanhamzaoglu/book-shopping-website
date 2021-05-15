<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 

include "config.php";


if ($_POST["button"] == "add") {
    if (isset($_POST['uID']) && isset($_POST['bID']) && isset($_POST['pID'])) {
        $uID = $_POST['uID'];
        $bID = $_POST['bID'];
        $pID = $_POST['pID']; 
        $sql_statement1 = "INSERT INTO `includes_r2`(`uID`, `pID`) VALUES ('$uID', '$pID')";
        $sql_statement2 = "INSERT INTO `includes_r1`(`bID`, `pID`) VALUES ('$bID', '$pID')";
        $result1 = mysqli_query($db, $sql_statement1)  or die(mysqli_error($db));
        $result2 = mysqli_query($db, $sql_statement2)  or die(mysqli_error($db));

    }

    else
    {
        echo "The form is not set.";
    }

    header ("Location: admin.php");
    die();
}

else if ($_POST["button"] == "search") {
    if (isset($_POST['uID']) && isset($_POST['bID']) && isset($_POST['pID'])) { 
        
        $sql_statement = "SELECT * FROM includes_r1 JOIN includes_r2 ON includes_r1.pID=includes_r2.pID WHERE ";
        if (!empty($_POST['bID'])) {
            $sql_statement = $sql_statement . " bID = " . "'" . $_POST['bID'] . "'";
        }
        if (!empty($_POST['uID'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " uID = " . "'" . $_POST['uID'] . "'";
        }

         if (!empty($_POST['pID'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " includes_r2.pID = " . "'" . $_POST['pID'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM includes_r1 JOIN includes_r2 ON includes_r1.pID=includes_r2.pID";
    }
}


?>

<h1 class="text-center">Search Results</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>uID</th>
                <th scope=“col”>bID</th>
                <th scope=“col”>pID</th>
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
                            $uID = $row['uID'];
                            $bID = $row['bID'];
                            $pID = $row['pID'];

                            echo "<tr>";
                            echo "<td> $uID </td>";
                            echo "<td> $bID </td>";
                            echo "<td> $pID </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
        </table>
        <br>
    </div>
    <br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>