<?php
 session_start(); 
 ?>

<html>


	<head>
		<title>Connection</title>
	</head>

	<body>

<a href="taches/list.php">LIST</a>




		</form>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
    
    <form action="login.php" method="POST">
        <p>Login : <input type="text" name="login" /></p>
        <p>Mot de passe : <input type="password" name="mdp" /></p>
        <p><input type="submit" value="OK"></p>
    </form>


	</body>

</html>