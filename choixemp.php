<?php

// On appel la session et la BDD

	include_once("config.php");
	session_start();
	
// On récupère les parmètres envoyés

	$id_emp= $_POST['affecter'];
	$id_demande= $_POST['iddd'];

// Requête pour obtenir les données voulues

	$result = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user = '$id_emp' ");
				
		while($res=mysqli_fetch_array($result)){ $emp= $res['id_user'];
												 $login= $res['login'];
		}

// Mise à jour des données dans la BDD

	$add = mysqli_query($mysqli, "UPDATE demande
								  SET nom_employe =  '$login',
								  	  id_responsable ='$emp'
								  WHERE id_demande = '$id_demande' ");
		
// Redirection vers la page administration.php

	header ("location: administration.php"); 


?> 