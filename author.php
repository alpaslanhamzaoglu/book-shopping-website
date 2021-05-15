<h1 class="text-center">Authors</h1>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>ID</th>
                <th scope=“col”>Name</th>
                <th scope=“col”>Surname</th>
                <th scope=“col”>Nationality</th>
                <th scope=“col”>Birthday</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        $sql_statement = "SELECT * FROM authors";
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['aID'];
                            $name = $row['aname'];
                            $surname = $row['asurname'];
                            $nationality = $row['anationality'];
                            $birthday = $row['abirthday'];


                            echo "<tr>";
                            echo "<th scope=“row”> $id </th>";
                            echo "<td> $name </td>";
                            echo "<td> $surname </td>";
                            echo "<td> $nationality </td>";
                            echo "<td> $birthday </td>";
                            echo "<tr/>";
                        }
                    ?>                  
            </tbody>
            
        </table>
        <form action="deleteAuthor.php" method="POST">
        <div class="dropdown">
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="aID"> Test
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM authors";
            $result = mysqli_query($db, $sql_statement);
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['aID'];
                echo "<option value='$id'>$id</option>";
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:2.5px; font-size: 10px;">delete</button>
    </div>
</form>
<br>
<form action="authorForm.php" method="POST">
    <div class="form-group">

        <label for="aID">aID</label>
        <input type="id" class="form-control" name="aID" placeholder="ID">

        <label for="authorName">Name</label>
        <input class="form-control" name="authorName" placeholder="Name">

        <label for="authorSurname">Surname</label>
        <input class="form-control" name="authorSurname" placeholder="Surname">

        <label for="authorNationality">Nationality</label>
        <input class="form-control" name="authorNationality" placeholder="Nationality">

        <label for="authorBirthday">Birthday</label>
        <input class="form-control" type="date" name="authorBirthday" placeholder="YYYY-MM-DD">
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>

    </div>