<?php 
session_start(); 
$conn = mysqli_connect('localhost', 'root', '', 'proje');

//print_r($_POST);
 if($conn->connect_errno > 0){
 	
 	die('unable to connect to [' . $conn->connect_errno . ']');
 }

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['upassword']) && isset($_POST['re_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

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
	       	  header("Location: login2.php?success=Your account has been created successfully");
	          exit();
	        }else {
	             header("Location: signup.php?error=unknown error occurred");
		         exit();
		    }
        }
	} 
	 
}else{
	header("Location: signup.php");
	exit();
}
?>
