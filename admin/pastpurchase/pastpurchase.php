<h1 class="text-center">Past Purchases</h1>
<hr>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>pID</th>
                <th scope=“col”>pdate</th>
                <th scope=“col”>paddress</th>
            </thead>
            <tbody>
                <?php                     
                    include "config.php";
                    $sql_statement = "SELECT * FROM pastpurchases";
                    $result = mysqli_query($db, $sql_statement);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<th>Empty</th>";
                    }
                    else {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $pID = $row['pID'];
                            $pdate = $row['pdate'];
                            $paddress = $row['paddress'];
                            
                            echo "<tr>";
                            echo "<th scope=“row”> $pID </th>";
                            echo "<td> $pdate </td>";
                            echo "<td> $paddress </td>";
                            echo "<tr/>";
                        }
                    }                                        
                ?>                  
            </tbody>            
        </table>
        <form action="pastpurchase/deletePastPurchase.php" method="POST">
            <div class="dropdown">
                <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="pID"> Test
                    <?php 
                        include "config.php";
                        $sql_statement = "SELECT * FROM pastpurchases";
                        $result = mysqli_query($db, $sql_statement);
                        if (mysqli_num_rows($result) == 0) {
                            echo "<option>Empty</option>";
                        }
                        else {
                            echo "<option>Select</option>";
                            while($row = mysqli_fetch_assoc($result)) {
                                $pID = $row['pID'];
                                $pdate = $row['pdate'];
                                $paddress = $row['paddress'];
                                echo "<option value='$pID'>$pID</option>";
                            }
                        }                        
                    ?>
                </select>
            <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
            </div>
        </form>
        <br>
    <form action="pastpurchase/pastPurchaseForm.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <label for="pID">pID</label>
                    <input type="id" class="form-control" name="pID" placeholder="Number">
                </div>                                    
                <div class="col-xs-6">
                    <label for="pdate">pdate</label>
                    <input class="form-control" name="pdate" type="date" min="2000-01-01" max="2021-12-31">
                </div> 
            </div>
            <div>
                <div class="col-xs-12">
                    <label for="pID">paddress</label>
                    <input type="text" class="form-control" name="paddress" placeholder="Address">
                </div> 
            </div>                       
        </div>
        <br>
        <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
        <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>
</div>
<br>