<h1 class="text-center">Reviews</h1>
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
                        $sql_statement = "SELECT * FROM review";
                        $result = mysqli_query($db, $sql_statement);
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
        <form action="deleteReview.php" method="POST">
        <div class="dropdown">
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="rcomment"> Test
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM review";
            $result = mysqli_query($db, $sql_statement);
            while($row = mysqli_fetch_assoc($result)) {
                $rcomment = $row['rcomment'];
                $bID = $row['bID'];
                echo "<option value='$rcomment'>$rcomment</option>";
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:2.5px; font-size: 10px;">delete</button>
        </div>
        </form>
        <br>
    <form action="reviewForm.php" method="POST">
    <div class="form-group">

        <label for="rating">rating</label>
        <input type="id" class="form-control" name="rating" placeholder="5">

        <label for="rcomment">comment</label>
        <input type="rcomment" class="form-control" name="rcomment" placeholder="Good">
        <label for="rcomment">uID</label>
        <br>
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uID">
        
        <?php 
            include "config.php";
            $sql_statement = "SELECT uID FROM users";
            $result = mysqli_query($db, $sql_statement);
            while($row = mysqli_fetch_assoc($result)) {
                $uID = $row['uID'];
                echo "<option value='$uID'>$uID</option>";
            }
        ?>
        </select>
        <br>
        <label for="rcomment">bID</label>
        <br>
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="bID">
        
        <?php 
            include "config.php";
            $sql_statement = "SELECT bID FROM books";
            $result = mysqli_query($db, $sql_statement);
            while($row = mysqli_fetch_assoc($result)) {
                $bID = $row['bID'];
                echo "<option value='$bID'>$bID</option>";
            }
        ?>
        </select>
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
    </div>
    <br>
