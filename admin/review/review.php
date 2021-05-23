<h1 class="text-center">Reviews</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>rating(1 - 10, 0 = didn't give rating)</th>
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
        <form action="review/deleteReview.php" method="POST">
        <div class="dropdown">
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uIDbID"> Test
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM review";
            $result = mysqli_query($db, $sql_statement);
            if (mysqli_num_rows($result) == 0) {
                echo "<option>Empty</option>";
            }
            else {
                echo "<option>Select</option>";
                while($row = mysqli_fetch_assoc($result)) {
                    $uID = $row['uID'];
                    $bID = $row['bID'];
                    $uIDbID = $uID . "-".$bID;
                    echo "<option value='$uIDbID'>$uIDbID</option>";
                }
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
        </div>
        </form>
        <br>
    <form action="review/reviewForm.php" method="POST">
    <div class="form-group">

        <label for="rating">rating</label>
        <input type="number" class="form-control" name="rating" placeholder="1-10" min="1" max="10">

        <label for="rcomment">comment</label>
        <input type="rcomment" class="form-control" name="rcomment" placeholder="Good">
        <label for="rcomment">uID</label>
        <br>
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uID">
        
        <?php 
            include "config.php";
            $sql_statement = "SELECT uID FROM users";
            $result = mysqli_query($db, $sql_statement);
            if (mysqli_num_rows($result) == 0) {
                echo "<option>Empty</option>";
            }
            else {
                echo "<option>Select</option>";
                while($row = mysqli_fetch_assoc($result)) {
                    $uID = $row['uID'];
                    echo "<option value='$uID'>$uID</option>";
                }
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
                if (mysqli_num_rows($result) == 0) {
                    echo "<option>Empty</option>";
                }
                else {
                    echo "<option>Select</option>";
                    while($row = mysqli_fetch_assoc($result)) {
                        $bID = $row['bID'];
                        echo "<option value='$bID'>$bID</option>";
                    }
                }
            ?>
        </select>
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
    </div>
    <br>
