<?php

	session_start();
	
?>

<html>
<head>
	<title>employe</title>
</head>
<body>

		<link rel="stylesheet" type="text/css" href="css/employe.css" />


<a href="deconnexion.php">Déconnexion</a>


	<table id="tableau" data-responsive="table">
		<thead>
			<tr>
				<th> Nom </th>
				<th> Problème </th>
				<th> Priorité </th>
				<th> Etat </th>
				<th> Personne Affectée </th> 
				<th> Modifier l'etat </th>
				<th> Ajouter un commentaire </th>
			</tr>
		</thead>
		
				<?php
					include('config.php');
					$result =mysqli_query($mysqli,
						"SELECT *
						FROM demande
						INNER JOIN user
						ON demande.id_us = user.id_user
						INNER JOIN etat
						ON demande.id_eta = etat.id_etat
						WHERE id_responsable = '".$_SESSION["id"]."'");
					
				?>
				<?php
				// assignation des élément contenu dans result
				while($res = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>".$res['login']."</td>";
					echo "<td>".$res['type_demande']."</td>";
					echo "<td>".$res['id_prio']."</td>";
					echo "<td>".$res['libelle']."</td>";
					echo "<td>".$res['nom_employe']."</td>";
					$pageadd = "add_emp.php";
					$pageadd2 = "add_emp2.php";
					$id=$res['id_demande'];
					echo "<td>"."
								<form action='$pageadd' method='POST'>
									<div>
							  			<input type='radio' name='id_eta' value='2' checked>
							  			<label for='en_attente'>En attente</label>
									</div>
									<div>
							  			<input type='radio' name='id_eta' value='3'>
							  			<label for='en_cours'>En cours</label>
									</div>
									<div>
							  			<input type='radio' name='id_eta' value='4' >
							  			<label for='fini'>Fini</label>
									</div>
									<div>
										</br>
											<input type='hidden' name='idd' value='$id'> </input>
							        		<input type='submit' value='Modifier'></input>
							      </form>
							        </div>";

					echo "<td>"."	
								<form action='$pageadd2' method='POST'>
									<div>
										<textarea name='commentaire' rows='3' cols='50' maxlength='500' placeholder='".$res['commentaire']."'></textarea>
									</div>
									<div>
										</br>
											<input type='hidden' name='idd' value='$id'> </input>
							        		<input type='submit' value='Modifier'></input>
							        </div>
							        <hr>
							    </form>"
						."</td>"
						."</tr>";
					}
				?>
	</table>




</body>
</html>