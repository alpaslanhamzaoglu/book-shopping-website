<h1 class="text-center">Books</h1>
<hr>
<div class="container">
    <table class="table">
        <thead>
            <th scope=“col”>ID</th>
            <th scope=“col”>Title</th>
            <th scope=“col”>Language</th>
            <th scope=“col”>Publisher</th>
            <th scope=“col”>Publish Date</th>
            <th scope=“col”>Price($)</th>
            <th scope=“col”>Category</th>
            <th scope=“col”>Book Image Links</th>
        </thead>
        <tbody>
            <?php                     
                include "config.php";
                $sql_statement = "SELECT * FROM books";
                $result = mysqli_query($db, $sql_statement);
                while($row = mysqli_fetch_assoc($result))
                {
                    $id = $row['bID'];
                    $title = $row['btitle'];
                    $language = $row['blanguage'];
                    $publisher = $row['bpublisher'];
                    $pubdate = $row['publishDate'];
                    $price = $row['bprice'];
                    $category = $row['bcategory'];
                    $blink = $row['blinks'];

                    echo "<tr>";
                    echo "<th scope=“row”> $id </th>";
                    echo "<td> $title </td>";
                    echo "<td> $language </td>";
                    echo "<td> $publisher </td>";
                    echo "<td> $pubdate </td>";
                    echo "<td> $price </td>";
                    echo "<td> $category </td>";
                    echo "<td> $blink </td>";
                    echo "<tr/>";
                }            
            ?>                  
        </tbody>        
    </table>
    <form action="book/deleteBook.php" method="POST">
        <div class="dropdown">
            <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="bID"> Test
                <?php 
                    include "config.php";
                    $sql_statement = "SELECT * FROM books";
                    $result = mysqli_query($db, $sql_statement);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<option>Empty</option>";
                    }
                    else {
                        echo "<option>Select</option>";
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['bID'];
                            echo "<option value='$id'>$id</option>";
                        }
                    }
                ?>
            </select>
            <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
        </div>
    </form>
    <br>
    <form action="book/bookForm.php" method="POST">
        <div class="form-group">
            <label for="bID">bID</label>
            <input type="id" class="form-control" name="bID" placeholder="ID">

            <label for="bookTitle">Title</label>
            <input class="form-control" name="bookTitle" placeholder="Title">

            <label for="bookLanguage">Language</label>
            <input class="form-control" name="bookLanguage" placeholder="Language">

            <label for="publisher">Publisher</label>
            <input class="form-control" id="publisher" name="publisher" placeholder="Publisher">

            <label for="pubdate">Publish Date</label>
            <input class="form-control" id="pubdate" name="pubdate" type="date" max="2021-12-31">

            <label for="bookPrice">Price($)</label>
            <input class="form-control" id="bookPrice" name="bookPrice" placeholder="Price($)">

            <label for="category">Category</label>
            <input class="form-control" id="category" name="category" placeholder="Category">

            <label for="blink">BookLinks</label>
            <input class="form-control" id="blink" name="blink" placeholder="Book Image Links">
        </div>
        <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
        <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
</div>