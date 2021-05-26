<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>body {
  background: #1690A7;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}

*{
  font-family: sans-serif;
  box-sizing: border-box;
}

form {
  width: 500px;
  border: 2px solid #ccc;
  padding: 30px;
  background: #fff;
  border-radius: 15px;
}

h2 {
  text-align: center;
  margin-bottom: 40px;
}

input {
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
}
label {
  color: #888;
  font-size: 18px;
  padding: 10px;
}

button {
  float: right;
  background: #555;
  padding: 10px 15px;
  color: #fff;
  border-radius: 5px;
  margin-right: 10px;
  border: none;
}
button:hover{
  opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
  text-align: center;
  color: #fff;
}

.ca {
  font-size: 14px;
  display: inline-block;
  padding: 10px;
  text-decoration: none;
  color: #444;
}
.ca:hover {
  text-decoration: underline;
}</style>
</head>
<body>
     <form action="signupForm.php" method="POST">
      <h2>LOGIN</h2>
          <label>Name</label>
          <input type="text" name="name" placeholder="Name"><br>

          <label>Surname</label>
          <input type="text" name="surname" placeholder="Surname"><br>

          <label>Email</label>
          <input type="email" name="email" placeholder="Email"><br>

          <label>Password</label>
          <input type="password" name="password" placeholder="Password"><br>

          <button type="submit">Sign Up</button>
     </form>
</body>
</html>

<?php 
session_start(); 
$conn = mysqli_connect('localhost', 'root', '', 'proje');

//print_r($_POST);
if($conn->connect_errno > 0){

die('unable to connect to [' . $conn->connect_errno . ']');
}
//if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['upassword']) && isset($_POST['re_pass'])) {

    // function validate($data){
    //    $data = trim($data);
    //    $data = stripslashes($data);
    //    $data = htmlspecialchars($data);
    //    return $data;
    // }

    $name = validate($_POST['name']);
    $surname = validate($_POST['surname']);
    $email = validate($_POST['email']);
    $upassword = validate($_POST['upassword']);
    $re_pass = validate($_POST['re_pass']);

    $user_data = '&name='. $name. 'surname='. $surname. 'email='. $email;


    if (empty($name)) {
        header("Location: signup.php?error=Name is required&$user_data");
        exit();

    }else if (empty($surname)) {
        header("Location: signup.php?error=Surname is required&$user_data");
        exit();

    }else if (empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();

    }else if(empty($upassword)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    }
    else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    }

    else if($upassword !== $re_pass){
        header("Location: signup.php?error=The confirmation password does not match!&$user_data");
        exit();
    }
    else{
        //$upassword = md5($upassword);

        $sql = "SELECT * FROM users WHERE email='$email' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The email is taken, try another");
            exit();
        }else {
            $sql2 = "INSERT INTO users(name, surname, email, upassword) VALUES('$name', '$surname','$email', '$upassword')";
            $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

            //echo $result2;
            if ($result2) {
              header("Location: login2.php");
              //exit();
            }else {
                 header("Location: signup.php?error=unknown error occurred.");
                 //exit();
            }
        }
    } 
     
/*}else{
    header("Location: signup.php");
    exit();
}*/
//}
?>
