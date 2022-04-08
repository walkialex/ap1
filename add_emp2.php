<?php

// On appel la session et la BDD

	include_once("config.php");
	session_start();

// On récupère les parmètres envoyés

	$id_demande= $_POST['idd'];
	$commentaire= $_POST['commentaire'];

// Mise à jour des données dans la BDD

	$result = mysqli_query($mysqli, "UPDATE demande
								  SET commentaire = '$commentaire'
 								  WHERE id_demande = '$id_demande'");

// Redirection vers la page employe.php

header ("location: employe.php")

?>