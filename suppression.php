<?php
session_start();
?>
<html>
<head>
	<title>suppression</title>
</head>
<body>

	<?php

	include('config.php');
	$id = $_GET['idsup'];


		$result = mysqli_query($mysqli,
			"DELETE FROM demande WHERE id_demande='$id'");


	?>

	<p><h1> L'annonce a bien été supprimée.</h1></p>

	<button type="button" onclick="window.location.href ='administration.php';">
	Retouner à la gestion des annonces
	</button>

</body>
</html>