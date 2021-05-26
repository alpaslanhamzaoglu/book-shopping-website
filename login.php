<?php 
  session_start(); 
  $conn = mysqli_connect('localhost', 'root', '', 'proje');
   
  if($conn->connect_errno > 0){
    die('unable to connect to [' . $conn->connect_errno . ']');
  }

  if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['upassword'])){

      /*function validate($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }*/

      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $upassword = $_POST['upassword']; 

      if (empty($name)) {
          header("Location: login2.php?error=Name is required");
          exit();
      }else if (empty($surname)) {
          header("Location: login2.php?error=Surname is required");
          exit();
      }else if(empty($upassword)){
          header("Location: login2.php?error=Password is required");
          exit();
      }else{

          $sql = "SELECT * FROM users WHERE name='$name' AND surname='$surname' AND upassword='$upassword'";
          $result = mysqli_query($conn, $sql); //or die(mysqli_error($conn));

          if (mysqli_num_rows($result) == 1) {
              $row = mysqli_fetch_assoc($result);
              if ($row['name'] == $name && $row['surname'] == $surname && $row['upassword'] == $upassword) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['upassword'] = $row['upassword'];
                header("Location: index.php?success");

              //    //exit();
              }/*else{
                  header("Location: login2.php?error=Incorrect name, surname or password");
                  //exit();
              }
          }else{
              header("Location: login2.php?error=Incorrect name, surname or passwordheyyy");
               //exit();*/
          }
      } 
  }
  else{
      header("Location: login2.php?success");
      exit();
  }
?>
