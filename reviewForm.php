<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 

include "config.php";

if ($_POST["button"] == "add") {
    if (isset($_POST['rating']) && isset($_POST['rcomment']) && isset($_POST['uID']) && isset($_POST['bID'])) {
        $rating = $_POST['rating'];
        $rcomment = $_POST['rcomment'];
        $uID = $_POST['uID'];
        $bID = $_POST['bID'];

        $sql_statement = "INSERT INTO `review`(`rating`, `rcomment`, `uID`, `bID`) VALUES ('$rating','$rcomment','$uID', '$bID')";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));

        header ("Location: admin.php");
        }
    

    else
    {
        echo "The form is not set.";
    }
}

else {
    if (isset($_POST['rating']) && isset($_POST['rcomment']) && isset($_POST['uID']) && isset($_POST['bID'])) { 
        
        $sql_statement = "SELECT * FROM review WHERE ";
        if (!empty($_POST['rating'])) {
            $sql_statement = $sql_statement . " rating = " . "'" . $_POST['rating'] . "'";
        }
        if (!empty($_POST['rcomment'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " rcomment = " . "'" . $_POST['rcomment'] . "'";
        }
        if (!empty($_POST['uID'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " uID = " . $_POST['uID'];
        }
        if (!empty($_POST['bID'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " bID = " . "'" . $_POST['bID'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM review";
    }
}


?>

<h1 class="text-center">Search Results</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>rating</th>
                <th scope=“col”>rcomment</th>
                <th scope=“col”>uID</th>
                <th scope=“col”>bID</th>
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
                            $rcomment = $row['rcomment'];
                            $bID = $row['bID'];
                            $rating = $row['rating'];

                            

                            echo "<tr>";
                            echo "<th scope=“row”> $rating </th>";
                            echo "<td> $rcomment </td>";
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