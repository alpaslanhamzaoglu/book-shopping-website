<h1 class="text-center">Shopping List</h1>
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
        <form action="deleteShoppinglist.php" method="POST">
            <div class="dropdown">
                <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="bID"> Test
                    <?php 
                        include "config.php";
                        $sql_statement = "SELECT * FROM shoppinglist";
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result)) {

                            $uID = $row['uID'];
                            $bID = $row['bID'];
                            $uIDbID = $uID."&".$bID;
                            echo "<option value='$uIDbID'>$uIDbID</option>";
                        }
                    ?>
                </select>
            <button class="btn btn-danger" style="padding:2.5px; font-size: 10px;">Delete</button>
            </div>
        </form>
        <br>
        
    <form action="shoppinglistForm.php" method="POST">
        <div class="form-group">   

            <label for="amount">amount</label>
            <br>
            <input name="amount" placeholder="amount">
            <br>
            <label for="uID">uID</label>
            <br>
            <input name="uID" placeholder="uID">
            <br>
            <label for="bID">bID</label>
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
        <br>
        <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
        <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
</div>
<br>