<?php

// On appel la session et la BDD

	include_once("config.php");
	session_start();

// On récupère les parmètres envoyés

	$id= $_SESSION['id'];
	$demande= $_POST['demande'];

// Envoie des données dans la BDD

	$add = mysqli_query($mysqli, "INSERT INTO `demande` (`id_demande`, `type_demande`, `commentaire`, `id_us`, `id_eta`, `priorite`, `id_employe`, `id_responsable`) 
								  VALUES (NULL, '$demande', NULL, '$id', '1', '1', NULL, NULL);");
		
// Redirection vers la page annonces.php

	header ("location: annonces.php");

?>