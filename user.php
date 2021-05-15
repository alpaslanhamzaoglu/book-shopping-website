<h1 class="text-center">Users</h1>
<div class="container">
        <table class="table">
            <thead>
                <th scope=“col”>id</th>
                <th scope=“col”>name</th>
                <th scope=“col”>surname</th>
                <th scope=“col”>email</th>
                <th scope=“col”>user type</th>
                <th scope=“col”>since</th>
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

                            $check_statement = "SELECT since FROM moderators WHERE uID ='" . $id . "'";
                            $is_moderator = mysqli_query($db, $check_statement);
                            $since = mysqli_fetch_assoc($is_moderator);
                            $date = "not admin / mod";
                            if (is_null($since['since']))
                            {
                                $check_statement = "SELECT since FROM admin WHERE uID ='" . $id . "'";
                                $is_admin = mysqli_query($db, $check_statement);
                                $since = mysqli_fetch_assoc($is_admin);
                                if (is_null($since['since'])) {
                                    $user_type = "normal";
                                }
                                else {
                                    $user_type = "admin";
                                    $date = $since['since'];
                                }
                            }
                            else {
                                $date = $since['since'];
                                $check_statement = "SELECT since FROM admin WHERE uID ='" . $id . "'";
                                $is_admin = mysqli_query($db, $check_statement);
                                $since = mysqli_fetch_assoc($is_admin);
                                
                                if (is_null($since['since'])) {
                                    $user_type = "mod";
                                }
                                else {
                                    $user_type = "admin and mod";
                                    $date = $date . " (mod) - " . $since['since'] . " (admin)";
                                }
                            }

                            echo "<tr>";
                            echo "<th scope=“row”> $id </th>";
                            echo "<td> $name </td>";
                            echo "<td> $surname </td>";
                            echo "<td> $email </td>";
                            echo "<td> $user_type </td>";
                                echo "<td> $date </td>";
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
            if (mysqli_num_rows($result) == 0) {
                echo "<option>Empty</option>";
            }
            else {
                echo "<option>Select</option>";
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['uID'];
                    echo "<option value='$id'>$id</option>";
                }
            }
        ?>
        </select>
            <button class="btn btn-danger" style="padding:4.5px; font-size: 15px;">Delete</button>
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
        <input class="form-control" id="adminSince" name="adminSince" type="date" min="2000-01-01" max="2021-12-31">

        <label for="modSince">mod since</label>
        <input class="form-control" id="modSince" name="modSince" type="date" min="2000-01-01" max="2021-12-31">

        <label for="password">password</label>
        <input class="form-control" id="password" name="password" placeholder="password">
    </div>
    <button type="submit" name="button" value="add" class="btn btn-primary">Add</button>
    <button type="submit" name="button" value="search" class="btn btn-secondary">Search</button>
    </form>

    </div>