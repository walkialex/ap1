<?php

// On appel la session et la BDD

	include_once("config.php");
	session_start();

// On récupère les parmètres envoyés

	$id_demande= $_POST['idd'];
	$id_prio= $_POST['id_prio'];

// Mise à jour des données dans la BDD

	$add = mysqli_query($mysqli, "UPDATE demande
								  SET id_prio = '$id_prio'
 								  WHERE id_demande = '$id_demande'");
		
// Redirection vers la page administration.php

	header ("location: administration.php");


?>