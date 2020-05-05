<?php

include ('sql.php'); //Fichier pour se connecter à la bdd

Session_start(); //démarre la session

 if (isset($_POST['login'])  && isset ($_POST['password'] ))
	{
	$nom = $_POST['nom'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$id_utilisateur = $_POST['id_utilisateur'];

if ($_POST["valeur"] == "Administrateur") //Si on choisit Administrateur
	  
	  { 
		$admin = $_POST["valeur"];	
		$resultat = mysqli_query($bdd, "UPDATE users SET nom = \"$nom\", login= \"$login\",`password`= \"$password\", 'Administrateur' = \"$admin\" WHERE `id_utilisateur`= \"$id_utilisateur"); //requête à faire sur la bdd
	  }
	  else 
	  {
		if ($_POST["valeur"] == "Utilisateur") //Si on choisit Utilisateur
		{
			$utili = $_POST["valeur"];
			$resultat = mysqli_query($bdd, "UPDATE `users` SET 'nom'= \"$nom\",`login`= \"$login\",`password`= \"$password\", 'Utilisateur' =  \"$utili\" WHERE `id_utilisateur`= \"$id_utilisateur");
		}	
	  
	  } 


if($result = mysql_query($resultat)) { 	 

$resultat = mysqli_query($bdd, "select * from users"); 



//Construction du tableau
echo "<!DOCTYPE html> /
<table border=2>

   <tr>
     <th>id_utilisateur</th>
	 <th>nom</th>
	 <th>prenom</th>
     <th>login</th>
	 <th>password</th>
	 <th>groupe</th>
	</tr>";


while ($donnees = mysqli_fetch_assoc $resultat)) {
	
		$id_utilisateur = $donnees['id_utilisateur']; //Affichage du tableau
		$nom = $donnees['nom'];
		$prenom = $donnees['prenom'];
		$login = $donnees['login'];
		$password = $donnees['password'];
		$groupe = $donnees['groupe'];
		echo '<tr><td>'.$id_utilisateur.'</td><td>'.$nom.'</td><td>'.$prenom.'</td><td>'.$login.'</td><td>'.$password.'</td><td>'.$groupe.'</td><td><a href="administrateur.php?action=editer&id='.$id_utilisateur.'">Editer</a></td><td><a href="administrateur.php?action=supprimer&id='.$id_utilisateur.'">Supprimer</a></td></tr>';
		
        }
echo "</table>";
echo '<tr><td><a href="formulaire2.php?action=ajouter">Ajouter un utilisateur</a></td></tr>';

		}
	

else {
    echo 'Erreur de requête de base de données.'; //Si il y a une erreur afficher ce message
}
echo "</html>";

}	
?>
