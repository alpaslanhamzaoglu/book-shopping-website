<h1 class="text-center">Books</h1>
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

                    echo "<tr>";
                    echo "<th scope=“row”> $id </th>";
                    echo "<td> $title </td>";
                    echo "<td> $language </td>";
                    echo "<td> $publisher </td>";
                    echo "<td> $pubdate </td>";
                    echo "<td> $price </td>";
                    echo "<td> $category </td>";
                    echo "<tr/>";
                }
            
            ?>                  
        </tbody>        
    </table>
    <form action="deleteBook.php" method="POST">
        <div class="dropdown">
            <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uID"> Test
                <?php 
                    include "config.php";
                    $sql_statement = "SELECT * FROM books";
                    $result = mysqli_query($db, $sql_statement);
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['bID'];
                        echo "<option value='$id'>$id</option>";
                    }
                ?>
            </select>
            <button class="btn btn-danger" style="padding:2.5px; font-size: 18px;">Delete</button>
        </div>
    </form>
    <br>
    <form action="bookForm.php" method="POST">
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
            <input class="form-control" id="pubdate" name="pubdate" type="date" value="2021-05-15" min="2000-01-01" max="2021-12-31">

            <label for="bookPrice">Price</label>
            <input class="form-control" id="bookPrice" name="bookPrice" placeholder="Price($)">

            <label for="category">Category</label>
            <input class="form-control" id="category" name="category" placeholder="Category">
        </div>
        <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
        <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
</div>