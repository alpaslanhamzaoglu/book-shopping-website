<h1 class="text-center">Wishlist</h1>
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
                <th scope=“col”>uID</th>
                <th scope=“col”>bID</th>
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
            while($row = mysqli_fetch_assoc($result)) {
                $uID = $row['uID'];
                $bID = $row['bID'];
                $uIDbID = $uID."-".$bID;
                echo "<option value='$uIDbID'>$uIDbID</option>";
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:2.5px; font-size: 10px;">delete</button>
        </div>
        </form>
        <br>
    <form action="wishlistForm.php" method="POST">
    <div class="form-group">

        <div class = 'form-column-w'>
        <label for="uID">uID</label>
        <input type="id" class="form-control" name="uID" placeholder="uID">
        </div>
        <div class = 'form-column-w'>
        <label for="bID">bID</label>
        <input type="id" class="form-control" name="bID" placeholder="bID">
        </div>
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>

    </div>