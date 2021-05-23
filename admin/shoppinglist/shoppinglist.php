<h1 class="text-center">Shopping List</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>bID</th>
                <th scope=“col”>uID</th>
                <th scope=“col”>amount</th>
            </thead>
            <tbody>
                <?php 
                    include "config.php";
                    $sql_statement = "SELECT * FROM shoppinglist";
                    $result = mysqli_query($db, $sql_statement);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $uID = $row['uID'];
                        $bID = $row['bID'];
                        $amount = $row['amount'];  

                        echo "<tr>";
                        echo "<th scope=“row”> $bID </th>";
                        echo "<td> $uID </td>";
                        echo "<td> $amount </td>";
                        echo "<tr/>";
                    }  
                ?>                  
            </tbody>    
        </table>
        <form action="shoppinglist/deleteShoppinglist.php" method="POST">
            <div class="dropdown">
                <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uIDbID"> Test
                    <?php 
                        include "config.php";
                        $sql_statement = "SELECT * FROM shoppinglist";
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
        
    <form action="shoppinglist/shoppinglistForm.php" method="POST">
        <div class="form-group">   
            <label for="amount">amount</label>
            <input type="number" class="form-control" name="amount" placeholder="amount" min="1">

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
        <br>
        <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
        <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
</div>
<br>