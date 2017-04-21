<?php
if(isset($_POST["name"]) && isset($_POST["password"])){
	
    $file = fopen('data.txt', 'r');
	if(!$file) die("File not found");
    $good=false;
    while(!feof($file)){
			$line = fgets($file);
			list($user, $pass) = explode(';', $line);
			if(trim($user) == $_POST['name'] && trim($pass) == $_POST['password']){
        	$good=true;
			break;
		}
	}

    if($good){
		session_start();
		if($_POST['autologin'] == 1){
			$password_hash = password_hash(trim($pass),PASSWORD_DEFAULT);
			setcookie("mycookie",$password_hash, time() + (3600 * 24 * 30));
		}
		$_SESSION['name'] = $_POST["name"];
		header("Location: private.php");
		
    }else{
        $message="Try again";
		echo "<script> alert('$message'); </script>";
		include 'index.php';
    }
fclose($file);
}else{
    header("Location: index.php");
}
?>