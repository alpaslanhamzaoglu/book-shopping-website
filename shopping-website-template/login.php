<?php 
  session_start(); 
  $conn = mysqli_connect('localhost', 'root', '', 'proje');
   
if($conn->connect_errno > 0){
    die('unable to connect to [' . $conn->connect_errno . ']');
}

if (isset($_POST['email']) && isset($_POST['password'])){

      /*function validate($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }*/

    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE email = '$email' AND upassword = '$password'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['uID'] = $row['uID'];
        header("Location: index.php");

    }else{
        header("Location: login2.php?detail=Incorrect name, surname or passwordheyyy");
        //exit();
    }     
}
else{
      header("Location: login2.php?detail=Incorrect name, surname or passwordheyyy");
      exit();
}
?>
