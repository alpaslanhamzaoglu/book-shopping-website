<h1 class="text-center">Includes</h1>
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
            Includes R1
        </h5>
          <table class="table">
            <thead>
                <th scope=“col”>bID</th>
                <th scope=“col”>pID</th>
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
            Includes R2
        </h5>
        <table class="table">
            <thead>
                <th scope=“col”>uID</th>
                <th scope=“col”>pID</th>
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
        <h5>
            Concatinated Includes
        </h5>
        <table class="table">
            <thead>
                <th scope=“col”>uID</th>
                <th scope=“col”>bID</th>
                <th scope=“col”>pID</th>
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
      </div>
        <form action="deleteIncludes.php" method="POST">
        <div class="dropdown" >
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uIDbIDpID">
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM includes_r1 JOIN includes_r2 ON includes_r1.pID=includes_r2.pID";
            $result = mysqli_query($db, $sql_statement);
            while($row = mysqli_fetch_assoc($result)) {
                $uID = $row['uID'];
                $bID = $row['bID'];
                $pID = $row['pID'];
                $uIDbIDpID = $uID."-".$bID."-".$pID;
                echo "<option value='$uIDbIDpID'>$uIDbIDpID</option>";
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:2.5px; font-size: 10px;">delete</button>
        </div>
        </form>
        <br>

    <form action="includesForm.php" method="POST">
    <div class="form-group">
        
        <div class = 'form-column'>
        <label for="uID">uID</label>
        <input type="id" class="form-control" name="uID" placeholder="uID">
        </div>
        <div class = 'form-column'>
        <label for="bID">bID</label>
        <input type="id" class="form-control" name="bID" placeholder="bID">
        </div>
        <div class = 'form-column'>
        <label for="pID">pID</label>
        <input type="id" class="form-control" name="pID" placeholder="pID">
        </div>
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>

    </div>
    <br>