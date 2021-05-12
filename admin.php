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
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">JavaScript</a></li>
        </ul>
        <button class="btn btn-danger">delete</button>
        </div>
        <br>
    <form action="createUser.php" method="POST">
    <div class="form-group">

        <label for="uID">uID</label>
        <input type="id" class="form-control" name="uID" placeholder="id">

        <label for="userName">name</label>
        <input class="form-control" name="userName" placeholder="name">

        <label for="userSurname">surname</label>
        <input class="form-control" name="userSurname" placeholder="surname">

        <label for="userEmail">email</label>
        <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email">

        <label for="password">password</label>
        <input class="form-control" id="password" name="password" placeholder="password">
    </div>
    <button type="submit" class="btn btn-primary">ekle</button>
    <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>