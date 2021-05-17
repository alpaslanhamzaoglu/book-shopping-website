<h1 class="text-center">Wishlist</h1>
<hr>
<div class="container">
<style>
table, th, td,h5 {
  text-align: center;
}
.form-column-w {
  float: left;
  width: 50%;
  padding: 5px;
}
</style>
        <table class="table">
            <thead>
                <th scope="col">uID</th>
                <th scope="col">bID</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        $sql_statement = "SELECT * FROM wishlist";
                        $result = mysqli_query($db, $sql_statement);
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
        <form action="deleteWishlist.php" method="POST">
        <div class="dropdown">
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uIDbID">
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM wishlist";
            $result = mysqli_query($db, $sql_statement);
            if (mysqli_num_rows($result) == 0) {
                echo "<option>Empty</option>";
            }
            else {
                echo "<option>Select</option>";
                while($row = mysqli_fetch_assoc($result)) {
                    $uID = $row['uID'];
                    $bID = $row['bID'];
                    $uIDbID = $uID."-".$bID;
                    echo "<option value='$uIDbID'>$uIDbID</option>";
                }
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
        </div>
        </form>
        <br>
    <form action="wishlistForm.php" method="POST">
    <div class="form-group">

    <label for="uID">uID</label>
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
            <label for="bID">bID</label>
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