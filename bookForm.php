<?php 

include "config.php";

if ($_POST["button"] == "add") {
    if (isset($_POST['bID']) && isset($_POST['bookTitle']) && isset($_POST['bookLanguage']) && isset($_POST['publisher']) && isset($_POST['pubdate']) && isset($_POST['bookPrice']) && isset($_POST['category'])) {
        $title = $_POST['bookTitle'];
        $langu = $_POST['bookLanguage'];
        $id = $_POST['bID'];
        $pub = $_POST['publisher'];
        $pubdat = $_POST['pubdate'];
        $price = $_POST['bookPrice'];
        $cate = $_POST['category'];

        $sql_statement = "INSERT INTO books(bID, blanguage, btitle, bpublisher, publishDate, bprice, bcategory) VALUES('$id', '$langu', '$title', '$pub', '$pubdat', '$price', '$cate')";
        $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
        header ("Location: admin.php");
        die();
    }

    else
    {
        echo "The form is not set.";
    }
}

else if ($_POST["button"] == "search") {
    if (isset($_POST['bID']) && isset($_POST['bookTitle']) && isset($_POST['bookLanguage']) && isset($_POST['publisher']) && isset($_POST['pubdate']) && isset($_POST['bookPrice']) && isset($_POST['category'])) { 
        
        $sql_statement = "SELECT * FROM books WHERE ";
        if (!empty($_POST['bID'])) {
            $sql_statement = $sql_statement . " bID = " . "'" . $_POST['bID'] . "'";
        }
        if (!empty($_POST['bookTitle'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " btitle = " . "'" . $_POST['bookTitle'] . "'";
        }
        if (!empty($_POST['bookLanguage'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " blanguage = " . $_POST['bookLanguage'];
        }
        if (!empty($_POST['publisher'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " bpublisher = " . "'" . $_POST['publisher'] . "'";
        }
        if (!empty($_POST['pubdate'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " publishDate = " . "'" . $_POST['pubdate'] . "'";
        }
        if (!empty($_POST['bookPrice'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " bprice = " . "'" . $_POST['bookPrice'] . "'";
        }
        if (!empty($_POST['category'])) {
            if (substr($sql_statement,-6) != "WHERE ") {
                $sql_statement = $sql_statement . " AND "; 
            }
            $sql_statement = $sql_statement . " bcategory = " . "'" . $_POST['category'] . "'";
        }
    }

    if (substr($sql_statement,-6) == "WHERE ") { 
        $sql_statement =  "SELECT * FROM books";
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
        <h1 class="text-center"> Search Results </h1>
        <br><br>
        <div class="container">  
            <table class="table">
                <thead>
                    <th scope=“col”>ID</th>
                    <th scope=“col”>Title</th>
                    <th scope=“col”>Language</th>
                    <th scope=“col”>Publisher</th>
                    <th scope=“col”>Publish Date</th>
                    <th scope=“col”>Price</th>
                    <th scope=“col”>Category</th>
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
                            $title = $row['btitle'];
                            $langu = $row['blanguage'];
                            $id = $row['bID'];
                            $pub = $row['bpublisher'];
                            $pubdat = $row['publishDate'];
                            $price = $row['bprice'];
                            $cate = $row['bcategory'];

                            echo "<tr>";
                            echo "<th scope=“row”> $id </th>";
                            echo "<td> $title </td>";
                            echo "<td> $langu </td>";
                            echo "<td> $pub </td>";
                            echo "<td> $pubdat </td>";
                            echo "<td> $price </td>";
                            echo "<td> $cate </td>";
                            echo "<tr/>";
                        }                    
                    ?>                  
                </tbody>            
            </table>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>