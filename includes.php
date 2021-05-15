<h1 class="text-center">Includes</h1>
<hr>
<style>
.row {
  margin-left:-5px;
  margin-right:-5px;
}
.row::after {
  content: "";
  clear: both;
  display: table;
}
.column {
  float: left;
  width: 50%;
  padding: 5px;
}
.form-column {
  float: left;
  width: 33%;
  padding: 5px;
}
</style>
<div class="container">
      <div class = 'row'>
        <div class = "column">
        <h5>
            <b>Includes R1</b>
        </h5>
          <table class="table">
            <thead>
                <th scope="col">bID</th>
                <th scope="col">pID</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        $sql_statement = "SELECT * FROM includes_r1";
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $bID = $row['bID'];
                            $pID = $row['pID'];

                            echo "<tr>";
                            echo "<td> $bID </td>";
                            echo "<td> $pID </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
            
        </table>
        </div>
        <div class = "column">
        <h5>
            <b>Includes R2</b>
        </h5>
        <table class="table">
            <thead>
                <th scope="col">uID</th>
                <th scope="col">pID</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        $sql_statement = "SELECT * FROM includes_r2";
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $uID = $row['uID'];
                            $pID = $row['pID'];

                            echo "<tr>";
                            echo "<td> $uID </td>";
                            echo "<td> $pID </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
            
        </table>
        </div>
        
      </div>
      <h5>
           
            <b>Concatenate Includes</b>
            
        </h5>
        <table class="table">
            <thead>
                <th scope="col">uID</th>
                <th scope="col">bID</th>
                <th scope="col">pID</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        $sql_statement = "SELECT * FROM includes_r1 JOIN includes_r2 ON includes_r1.pID=includes_r2.pID";
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $uID = $row['uID'];
                            $bID = $row['bID'];
                            $pID = $row['pID'];

                            echo "<tr>";
                            echo "<td> $uID </td>";
                            echo "<td> $bID </td>";
                            echo "<td> $pID </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
            
        </table>
        <form action="deleteIncludes.php" method="POST">
        <div class="dropdown" >
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uIDbIDpID">
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM includes_r1 JOIN includes_r2 ON includes_r1.pID=includes_r2.pID";
            $result = mysqli_query($db, $sql_statement);
            if (mysqli_num_rows($result) == 0) {
                echo "<option>Empty</option>";
            }
            else {
                echo "<option>Select</option>";
                while($row = mysqli_fetch_assoc($result)) {
                    $uID = $row['uID'];
                    $bID = $row['bID'];
                    $pID = $row['pID'];
                    $uIDbIDpID = $uID."-".$bID."-".$pID;
                    echo "<option value='$uIDbIDpID'>$uIDbIDpID</option>";
                }
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
        </div>
        </form>
        <br>

    <form action="includesForm.php" method="POST">
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

            <br>
            <label for="pID">pID</label>
            <br>
            <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="pID">        
            <?php 
                include "config.php";
                $sql_statement = "SELECT pID FROM pastpurchases";
                $result = mysqli_query($db, $sql_statement);
                if (mysqli_num_rows($result) == 0) {
                    echo "<option>Empty</option>";
                }
                else {
                    echo "<option>Select</option>";
                    while($row = mysqli_fetch_assoc($result)) {
                        $pID = $row['pID'];
                        echo "<option value='$pID'>$pID</option>";
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