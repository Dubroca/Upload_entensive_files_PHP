<?php

include ('sql.php');


 if (isset($_POST['login'])  && isset ($_POST['password'])) //On vérifie que ces variables existent
	{
	$nom = $_POST['nom']; //On récupère les valeurs des nom, prénom, login, password
	$prenom = $_POST['prenom'];
	$login = $_POST['login'];
	$password = $_POST['password'];

		$resultat = mysqli_query($bdd, "insert into users values ('0','$nom', '$prenom', '$login', '$password', 'Utilisateur')"); //On insère dans la bdd les résultats
	 
	 }
	      
	echo '<div align="center">';
	echo "<h2>Inscription effectuée !<br></h2>";
	echo '<a href="accueil.html">Connectez-vous</a>'; //On renvoie avec un lien vers la page de connexion
	echo '</div>';
		
?>