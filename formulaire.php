<html>

<?php 

	session_start();

	include_once("config.php"); 
?>


	<head><title>interface</title></head>

	<body>
		<link rel="stylesheet" type="text/css" href="css/formulaire.css" />
		<!--formumaire pour renseigner les paramamètres de la demande-->
		<form action="add.php" method="POST">
			<p><h3>Veuillez remplir le formulaire de demmande :</h3></p>
			<div>
				<textarea name="demande" rows="5" cols="50" maxlength="500" spellcheck required placeholder="Quel est le problème ?"></textarea>
			</div>
			<div>
				</br>
	        		<input type="submit" value="Envoyer"></input>
	        </div>
	         <a href ="annonces.php">Voir les demandes </a>
	    </form>
	  </br>
	 

	</body>
</html>