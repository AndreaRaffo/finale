<?php
include 'connect.php';
if(isset($_POST["name"]) && isset($_POST["password"])){
	
$myusername = mysqli_real_escape_string($conn,$_POST["name"]);
$mypassword = mysqli_real_escape_string($conn,$_POST["password"]); 
$sql = "SELECT * FROM Users WHERE Username = '$myusername' AND Password = '$mypassword'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if($count == 1) {
	session_start();
	if($_POST['autologin'] == 1){
		$password_hash = password_hash(trim($pass),PASSWORD_DEFAULT);
		setcookie("mycookie",$password_hash, time() + (3600 * 24 * 30));
	}
	$_SESSION['name'] = $_POST["name"];
	header("Location: private.php");
 }
 else{
  	$message="Login non riuscito";
	echo "<script> alert('$message'); </script>";
	include 'index.php';
 }
}
 else{
    header("Location: index.php");
}

?>