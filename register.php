
<?php
include 'connect.php';
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["mail"])){
	
$username = $_POST['username'];
$password = $_POST['password'];
$name = 	$_POST["name"];
$surname = $_POST["surname"];
$mail = 	$_POST["mail"];
	
$myusername = mysqli_real_escape_string($conn,$username);
$mypassword = mysqli_real_escape_string($conn,$password); 
$myname = mysqli_real_escape_string($conn,$name); 
$mysurname = mysqli_real_escape_string($conn,$surname); 
$mymail = mysqli_real_escape_string($conn,$mail); 

$sql = "SELECT Username,Mail FROM Users WHERE Username = '$myusername' OR Mail = '$mymail'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if($count == 0) {
	$sql1 = "INSERT INTO Users (Name, Surname, Username, Password, Mail) VALUES ('$myname', '$mysurname', '$myusername','$mypassword','$mymail')";
	if (mysqli_query($conn, $sql1)) {
	header("Location: index.php");
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
else{
	header("Location: index.php");
}
}

?>

