<?php
session_start();
?>
<html>
<head>	
	<title>edit</title>
</head>

<body>
	<link rel="stylesheet" type="text/css" href="css/edit.css" />
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<button type="button" onclick="window.location.href ='administration.php';">
	Retouner à la gestion des annonces
</button>
<br>
<br>
<br>
<br>
			<tr> 
				<td>Priorité : </td>
					<div>
			  			<input type="radio" name="priorite" value="3">
			  			<label for="urgent">Urgent</label>
					</div>
					<div>
			  			<input type="radio" name="priorite" value="2">
			  			<label for="moyen_urgent">Moyen urgent</label>
					</div>
					<div>
			  			<input type="radio" name="priorite" value="1" checked>
			  			<label for="pas_urgent">Pas urgent</label>
					</div>
					</br>

			    </tr> 
			    <tr>
				<td> Employe affecter : </td>

					<?php
				include('config.php');
				$result =mysqli_query($mysqli,
					"SELECT id_employe
					FROM demande
					INNER JOIN user
					ON demande.id_us = user.id_user
					INNER JOIN etat
					ON demande.id_eta = etat.id_etat;");
				
			?>
			        	<input type="submit" value="Envoyer"></input>
			  	    </div>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>