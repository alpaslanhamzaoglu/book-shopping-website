<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>id</th>
                <th scope=“col”>name</th>
                <th scope=“col”>surname</th>
                <th scope=“col”>email</th>
                <th scope=“col”>admin / mod since</th>
                <th scope=“col”>password</th>
            </thead>
            <tbody>
                    <?php 
                    
                        include "config.php";
                        $sql_statement = "SELECT * FROM users";
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['uID'];
                            $email = $row['email'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            $password = $row['upassword'];
                            $since = "not an admin / mod";

                            echo "<tr>";
                            echo "<th scope=“row”> $id </th>";
                            echo "<td> $name </td>";
                            echo "<td> $surname </td>";
                            echo "<td> $email </td>";
                            echo "<td> $since </td>";
                            echo "<td> $password </td>";
                            echo "<tr/>";

                        }
                    
                    ?>                  
            </tbody>
            
        </table>
        <form action="deleteUser.php" method="POST">
        <div class="dropdown">
        <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="uID"> Test
        <?php 
            include "config.php";
            $sql_statement = "SELECT * FROM users";
            $result = mysqli_query($db, $sql_statement);
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['uID'];
                echo "<option value='$id'>$id</option>";
            }
        ?>
        </select>
        <button class="btn btn-danger" style="padding:2.5px; font-size: 10px;">delete</button>
        </div>
        </form>
        <br>
    <form action="userForm.php" method="POST">
    <div class="form-group">

        <label for="uID">uID</label>
        <input type="id" class="form-control" name="uID" placeholder="id">

        <label for="userName">name</label>
        <input class="form-control" name="userName" placeholder="name">

        <label for="userSurname">surname</label>
        <input class="form-control" name="userSurname" placeholder="surname">

        <label for="userEmail">email</label>
        <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email">

        <label for="adminSince">admin since</label>
        <input class="form-control" id="adminSince" name="adminSince" validate="date" placeholder="DD/MM/YYYY">

        <label for="modSince">mod since</label>
        <input class="form-control" id="modSince" name="modSince" validate="date" placeholder="DD/MM/YYYY">

        <label for="password">password</label>
        <input class="form-control" id="password" name="password" placeholder="password">
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>