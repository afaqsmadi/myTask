<?php
session_start();
$username="";
$email="";
$errors=array();
//connect to the database
$db=mysqli_connect('localhost','root','','registration');
// to cheack if its conection to datadase
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	echo "hi";
  }
//if the register button is clicked
if(isset($_POST['register'])){
	$username=mysql_real_escape_string($_POST['username']);
	$email=mysql_real_escape_string($_POST['email']);
	$password_1=mysql_real_escape_string($_POST['password_1']);
	$password_2=mysql_real_escape_string($_POST['password_2']);

	//ensure that form field are fill 
	if(empty($username)){
		array_push($errors,"Username is required"); 
	}
	if(empty($email)){
		array_push($errors,"Username is required");
	}
	if(empty($password_1)){
		array_push($errors,"password is required");
	}
	if($password_1 !==$password_2){
		array_push($errors,"the two passwords do not match");
	}
	//if there are no errors save user to database
	if(count($errors)==0){
		 $password=md5($password_1) ; //encrypt password before storing in database (security)   
		$sql = "INSERT INTO users (username, email,password) VALUES ('$username', '$email', '$password')";
		        mysqli_query($db,$sql);
		        $_SESSION['username']=$username;
		         $_SESSION['success']="you are now logged in ";
		        header('location:index.php'); //redirect to homepage
	}
	
}
//log user in form login page
if(isset($_POST['login'])){
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
	
	//ensure that form field are fill 
	if(empty($username)){
		array_push($errors,"Username is required"); 
	}
	if(empty($password)){
		array_push($errors,"password is required");
	}

	if(count($errors)==0){
		$password=md5($password);//encrypt password before comparing with that from database 
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		$result=mysqli_query($db,$query) or die (mysqli_error($db));
		     // mysqli_error();

		if(mysqli_num_rows($result)){
			//log user in 
			$_SESSION['username']=$username;
			// $_SESSION['success']="you are now logged in ";
			header('location:profile.php');//redirect to home page 
		}else{
			array_push($errors, "wrong  username /password combination");
		}
	}

}

//logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location:profile.php');
}

?>