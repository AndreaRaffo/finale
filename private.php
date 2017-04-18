

<?php
session_start();
if(!isset($_SESSION['name'])){
	header("Location: index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Civic Hacking</title>
	<link href="style.css" rel = "stylesheet" type = "text/css"/>
</head>

<body>
<div id="header">
	<div class="container">
		<div id="logoArea">
		</div>
		<div id="navArea">
			<ul id="nav">
				<li><a href="index.php"><img src="Images/home.png" alt="Home"></a></li>
				<li><a href="#"><img src="Images/descrizione.png" alt="Descrizione"></a></li>
				<li><a href="#"><img src="Images/servizi.png" alt="Servizi"></a></li>
				<li><a href="#"><img src="Images/contatti.png" alt="contatti"></a></li>	
			</ul>
			
		  <a href="logout.php" id="logout"><img src="Images/logout.png" alt="Logout"></a>
																	
			</div>
		</div>
	</div>
	


	<div id="mainArea">
		<div class="container page">
			<?php echo "Benvenuto, ". $_SESSION['name'];
			?>

		</div>
	</div>
	
	<div id="footer">
		<div class="container">
			Sito di Marco Borinato e Andrea Raffo
		</div>
	</div>

</body>
</html>
