<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 

include "config.php";


if ($_POST["button"] == "add") {
    if (isset($_POST['uID']) && isset($_POST['bID'])) {
        $uID = $_POST['uID'];
        $bID = $_POST['bID'];

        $sql_statement = "INSERT INTO `wishlist`(`uID`, `bID`) VALUES ('$uID', '$bID')";
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
    if (isset($_POST['uID']) && isset($_POST['bID'])) { 
        
        $sql_statement = "SELECT * FROM wishlist WHERE ";
        if (!empty($_POST['bID'])) {
            $sql_statement = $sql_statement . " bID = " . "'" . $_POST['bID'] . "'";
        }
        if (!empty($_POST['uID'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " uID = " . "'" . $_POST['uID'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM wishlist";
    }
}


?>

<h1 class="text-center">Search Results</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope="col">uID</th>
                <th scope="col">bID</th>
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
                            $uID = $row['uID'];
                            $bID = $row['bID'];

                            echo "<tr>";
                            echo "<td> $uID </td>";
                            echo "<td> $bID </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
        </table>
        <br>
    </div>
    <br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
