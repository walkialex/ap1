<?php

// On appel la session et la BDD

	include_once("config.php");
	session_start();

// On récupère les parmètres envoyés

	$id_demande= $_POST['idd'];
	$eta= $_POST['id_eta'];

// Mise à jour des données dans la BDD

	$add = mysqli_query($mysqli, "UPDATE `demande`
								  SET `id_eta` = $eta
 								  WHERE `id_demande` = $id_demande;");

// Redirection vers la page employe.php

header ("location: employe.php")

?>