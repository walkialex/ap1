<?php

// On appel la session

	session_start();
?>

<html>
<head>
	<title>annonces</title>
</head>
<body>

<!-- On appel le CSS -->

	<link rel="stylesheet" type="text/css" href="css/annonces.css" />

<!-- Bouton de déconnexion -->

<a href="deconnexion.php">Déconnexion</a>


	
	<table id="tableau" data-responsive="table">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Problème</th>
			<th>Priorité</th>
			<th>Etat</th>
		</tr>
	</thead>
	<tbody>
			<?php
				include_once('config.php');
				$result =mysqli_query($mysqli,
"SELECT type_demande, id_prio, login, libelle
FROM demande
INNER JOIN user
ON demande.id_us = user.id_user
INNER JOIN etat
ON demande.id_eta = etat.id_etat;");
				
				while($row = mysqli_fetch_array($result)){
			?>
			<tr class="record">
			<td><?php echo $row['login']; ?></td>
			<td><?php echo $row['type_demande']; ?></td>
			<td><?php echo $row['id_prio']; ?></td>
			<td><?php echo $row['libelle']; ?></td>
			<?php
				}
			?>
		
	</tbody>
</table>
</body>
</html>