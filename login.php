<?php 

	session_start();

	include_once("config.php");


	
	$login= $_POST['login'];
	$mdp= $_POST['mdp'];

		if($login !=="" && $mdp !==""){
			$qry="SELECT * FROM user WHERE login='$login' AND mdp='$mdp'";
			$result= mysqli_query($mysqli, $qry);

				if ($result){
					if(mysqli_num_rows($result) > 0) {
						$member= mysqli_fetch_assoc($result);
						$_SESSION['login']= $member['login'];
						$_SESSION['role']= $member['id_role']; 
						$_SESSION['id']= $member['id_user'];
				}


			$result2= $_SESSION['role'];

				if ($result2 == 3) {
					header ("location: formulaire.php");
					
				}
				else if ($result2 == 2) {
					header ("location: employe.php");
					
				}
				else if ($result2 == 1) {
					header ("location: administration.php");
					
				}
				else if ($result2 == 0){
					header ("location: index.php");
					echo " login ou mot de passe incorrectes ! ";
				}
			}
	
		}
	else {
		header ("location: index.php");
		echo " login ou mot de passe incorrectes ! ";
	}

?>