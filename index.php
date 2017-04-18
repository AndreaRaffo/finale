
<?php
session_start();
if(isset($_SESSION['name'])){
	header("Location: private.php");
}
if(isset($_COOKIE["mycookie"])){
	$file = fopen('data.txt', 'r');
	while(!feof($file)){
		$line = fgets($file);
		list($user, $pass) = explode(';', $line);
		$psw = trim($pass);
		$usr = trim($user);
		$password_hash = password_hash($psw,PASSWORD_DEFAULT);
		if(password_verify($psw,$_COOKIE["mycookie"])){
			$_SESSION['name'] = $usr;
			header("Location: private.php");
		}
	}
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
			
			
		<button id="login" onclick="document.getElementById('id01').style.display='block'"><img src="Images/login.png" alt="Login"></button>
					<div id="id01" class="modal">
  						<form class="modal-content animate" name="login" action="login.php" method="post">
    					<div class="imgcontainer">
      						<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Chiudi">&times;</span>
      						<img src="Images/avatar.png" alt="Avatar" class="avatar">
    					</div>
						<div class="containerForm">
      						<input type="text" placeholder="Nome Utente" name="name" required>
      						<input type="password" placeholder="Password" name="password" required>
        			    	<button class="loginBtn" type="submit" value="Login" name="Login">Login</button>
        			    	<br>
     						<input name="autologin" type="checkbox" value="1"/>
     						Remember Me
							</br>
								
    					</div>
						<div class="containerForm" style="background-color:#a8aaad">
    					</div>
					  </form>
					</div>	
					
		
		  <img class="barra" src="Images/barra.png" alt="Barra">
		  
	    <button id="registrati" onclick="document.getElementById('id02').style.display='block'" type="submit" style="width: auto;">
		  <img src="Images/registrati.png" alt="Registrati">
		</button>		
		  			<div id="id02" class="modal">	
					<form class="modal-content animate" action="register.php" method="post">
   					<div class="imgcontainer">
      						<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Chiudi">&times;</span>
      						
    					</div>
    					<div class="containerForm">
     						<label><b>Inserisci i dati:</b></label>
      						<input type="text" placeholder="Nome" name="name" required>
      						<input type="text" placeholder="Cognome" name="surname" required>
      						<input type="text" placeholder="Nome Utente" name="username" required>
      						<input type="text" placeholder="Mail" name="mail" required>
      						<input type="password" placeholder="Password" name="password" required>
        			    	<button class="loginBtn" type="submit">Registrati</button>
    					</div>
						<div class="containerForm" style="background-color:#a8aaad">
    					</div>
					  </form>
					</div>	
																
			</div>
		</div>
	</div>
	


	<div id="mainArea">
		<div class="container page">
			<h3>Sito in costruzione</h3>
			
		</div>
	</div>
	
	<div id="footer">
		<div class="container">
			Sito di Marco Borinato e Andrea Raffo
		</div>
	</div>

</body>
</html>
