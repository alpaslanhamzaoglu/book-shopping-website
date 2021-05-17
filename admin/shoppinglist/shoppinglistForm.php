<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 

include "../config.php";

if ($_POST["button"] == "add") {
    if (isset($_POST['amount']) && isset($_POST['uID']) && isset($_POST['bID'])) {
        $amount = $_POST['amount'];
        $uID = $_POST['uID'];
        $bID = $_POST['bID'];

        $sql_statement = "INSERT INTO shoppinglist(amount, uID, bID) VALUES ('$amount','$uID', '$bID')";
        $result = mysqli_query($db, $sql_statement)  or die (mysqli_error($db));

        header ("Location: ../admin.php");
    }
    else
    {
        echo "The form is not set.";
    }
    header ("Location: ../admin.php");
    die();
}

else if ($_POST["button"] == "search") {
    if (isset($_POST['amount']) && isset($_POST['uID']) && isset($_POST['bID'])) { 
        
        $sql_statement = "SELECT * FROM shoppinglist WHERE ";
        if (!empty($_POST['amount'])) {
            $sql_statement = $sql_statement . " amount = " . "'" . $_POST['amount'] . "'";
        }
        if (!($_POST['uID'] == "Select")) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " uID = " . $_POST['uID'];
        }
        if (!($_POST['bID'] == "Select")) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " bID = " . "'" . $_POST['bID'] . "'";
        }
    }
    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM shoppinglist";
    }
}
?>
<a href="http://localhost/cs306-project-step-4/admin/admin.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go Back</a>  
<h1 class="text-center">Search Results</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>amount</th>
                <th scope=“col”>uID</th>
                <th scope=“col”>bID</th>
            </thead>
            <tbody>
                <?php   
                    include "../config.php";
                    
                    $result = mysqli_query($db, $sql_statement);
                    if (mysqli_num_rows($result) == 0) {
                        header ("Location: ../noResults.html");
                    }
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $uID = $row['uID'];
                        $bID = $row['bID'];
                        $amount = $row['amount'];

                        echo "<tr>";
                        echo "<th scope=“row”> $amount </th>";
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