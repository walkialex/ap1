<?php 

// On appel la session

	session_start();
?>


<html>
<head>
	<title>administration</title>
</head>
<body>
	
<!-- On appel le CSS -->

<link rel="stylesheet" type="text/css" href="css/administration.css" />

<!-- Bouton de déconnexion -->

<a href="deconnexion.php">Déconnexion</a>

<!--Création du tableau pour afficher les demandes -->

<table id="tableau" data-responsive="table">
	<thead>
		<tr>
			<th> Nom </th>
			<th> Problème </th>
			<th> Priorité </th>
			<th> Etat </th>
			<th> Commentaire </th>
			<th> Employe affecter </th>
			<th> Modifier la priorité</th>
			<th> Modifier la personne affecter</th>
		</tr>
	</thead>
	
<!-- Requète SQL pour chercher les données de la BDD -->

			<?php
				include('config.php');
				$result =mysqli_query($mysqli,
					"SELECT *
					FROM demande
					INNER JOIN user
					ON demande.id_us = user.id_user
					INNER JOIN etat
					ON demande.id_eta = etat.id_etat;");
				
			?>

<!-- Remplissage du tableau avec les données obenues de la requète SQL -->

<?php

while($res = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$res['login']."</td>";
echo "<td>".$res['type_demande']."</td>";
echo "<td>".$res['id_prio']."</td>";
echo "<td>".$res['libelle']."</td>";
echo "<td>"."<textarea rows='3' cols='50' maxlength='500' readonly='readonly' spellcheck required placeholder='".$res['commentaire']."'></textarea>"."</td>";
echo "<td>".$res['nom_employe']."</td>";

// Changement de priorité grâce à des boutons radio

$pageadd = "add_res.php";
$id=$res['id_demande'];
?>
	<td>
		<form action="$pageadd" method="POST">
			<div>
				<input type="radio" name="id_prio" value=3>
	 			<label for="en_attente">3: Urgent</label>
			</div>
			<div>
	 			<input type="radio" name="id_prio" value=2>
	  			<label for="en_cours">2: Moyen urgent</label>
			</div>
			<div>
				<input type="radio" name="id_prio" value=1 checked >
	  			<label for="fini">1:  Pas urgent</label>
			</div>
			<div>
			</br>
				<input type="hidden" name="idd" value= <?php echo $id; ?> ></input>
        		<input type="submit" value="Modifier"></input>
	    </form>
	        </div>
	<td>	
	
<!-- Menu déroulant pour choisir quel employé à affecter -->

	<form action="choixemp.php" method="POST">
	<select name="affecter" size="1" style="width:150px">

<?php

//liste de tout les employés

	$resultat = mysqli_query($mysqli,"SELECT * FROM user WHERE id_role=2"); 

	while($data=mysqli_fetch_array($resultat)){
		echo "<option value='".$data['id_user']."'>".$data['login']."</option>";
	}
?>	

</select>
<input type="hidden" name="iddd" value= <?php echo $id; ?> ></input>
<input type="submit" value="Modifier"></input>


<!-- Bouton pour supprimer la demande -->

<?php
echo "<td><a href='suppression.php?idsup=$res[id_demande]' onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";

}

?>


</table>


</body>
</html>
