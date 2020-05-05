<?php

include ('sql.php'); //Fichier pour se connecter à la bdd
$login = $_POST['login'];
$password = $_POST['password'];	

$resultat = mysqli_query($bdd, "SELECT id_utilisateur, groupe FROM users where login = \"$login\" and password = \"$password\""); //Requête à exécuter sur la bdd

$donnees = mysqli_fetch_assoc($resultat); //Boucle while pour afficher les résultats de la requête

if (mysqli_num_rows($resultat)) //Retourne le nombre de lignes 
	{	

		 if (isset($_POST['login'])  && isset($_POST['password']))
			 
	{										
			session_start(); //démarre une session 
			$_SESSION ['login'] = $_POST['login'];
			$_SESSION ['password'] = $_POST ['password'];
			$_SESSION ['groupe'] = $donnees['groupe'];
			$_SESSION ['id_utilisateur'] = $donnees['id_utilisateur'];
			$_SESSION ['id_chargement'] = $donnees['id_chargement'];
			header("Location: upload.php"); //redirection vers une autre page		 		 
	}
	 else 
		 
		{
			header("Location: erreur.php?acces=false"); //redirection vers une autre page et affiche le message d'erreur
			
		}
	}
	else 
{
	header("Location: erreur.php"); //Page avec les erreurs
}
 
?>	