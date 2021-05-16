<h1 class="text-center">Wrote</h1>
<hr>
<div class="container">
    <table class="table">
        <thead>
            <th scope=“col”>aID</th>
            <th scope=“col”>bID</th>
        </thead>
        <tbody>
            <?php                     
                include "config.php";
                $sql_statement = "SELECT * FROM wrote";
                $result = mysqli_query($db, $sql_statement);
                while($row = mysqli_fetch_assoc($result))
                {
                    $aid = $row['aID'];
                    $bid = $row['bID'];

                    echo "<tr>";
                    echo "<th scope=“row”> $aid </th>";
                    echo "<td> $bid </td>";
                    echo "<tr/>";
                }            
            ?>                  
        </tbody>        
    </table>
    <form action="deleteWrote.php" method="POST">
        <div class="dropdown">
            <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="abID"> Test
                <?php 
                    include "config.php";
                    $sql_statement = "SELECT * FROM wrote";
                    $result = mysqli_query($db, $sql_statement);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<option>Empty</option>";
                    }
                    else {
                        echo "<option>Select</option>";
                        while($row = mysqli_fetch_assoc($result)) {
                            $aid = $row['aID'];
                            $bid = $row['bID'];
                            $abID = $aid . "-".$bid;
                            echo "<option value='$abID'>$abID</option>";
                        }
                    }
                ?>
            </select>
            <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
        </div>
    </form>
    <br>
    <form action="wroteForm.php" method="POST">
        <div class="form-group">

            <br>
            <label for="aID">aID</label>
            <br>
            <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="aID">        
            <?php 
                include "config.php";
                $sql_statement = "SELECT aID FROM authors";
                $result = mysqli_query($db, $sql_statement);
                if (mysqli_num_rows($result) == 0) {
                    echo "<option>Empty</option>";
                }
                else {
                    echo "<option>Select</option>";
                    while($row = mysqli_fetch_assoc($result)) {
                        $aID = $row['aID'];
                        echo "<option value='$aID'>$aID</option>";
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