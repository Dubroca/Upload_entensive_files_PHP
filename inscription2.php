<?php

include ('sql.php');


 if (isset($_POST['login'])  && isset ($_POST['password'])) //On vérifie que ces variables existent
	{
	$nom = $_POST['nom']; //On récupère les valeurs des nom, prénom, login, password
	$prenom = $_POST['prenom'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	
	}

	if ($_POST["valeur"] == "Administrateur") //Si on choisit Administrateur
	  
	  { 
		$admin = $_POST["valeur"];
		$resultat = mysqli_query($bdd, "insert into users values ('0','$nom', '$prenom', '$login', '$password', '$admin')"); //On insère dans la bdd les résultats
	  }
	  else 
	  {
		if ($_POST["valeur"] == "Utilisateur") //Si on choisit Administrateur
	  
	  { 
		$utili = $_POST["valeur"];
		$resultat = mysqli_query($bdd, "insert into users values ('0','$nom', '$prenom', '$login', '$password', '$utili')"); //On insère dans la bdd les résultats
	  }
		
	echo '<div align="center">';
	echo "<h2>Inscription effectuée !<br></h2>";
	echo '<a href="administrateur.php">Revenir à la page admin</a>'; //On renvoie avec un lien vers la page de connexion
	echo '</div>';
	  }
?>