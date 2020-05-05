<?php

include ('sql.php'); //Fichier pour se connecter à la bdd

Session_start(); //démarre la session

echo  '<a href="logout.php" class="hautdepage" title="Déconnexion">Déconnexion</a>';
echo  '<link type="text/css" rel="stylesheet" href="test2.css" />';

if (isset($_GET['action'])) //on teste si la variable action existe
{
	if($_GET['action']=='editer') //si l'action est de cliquer sur "éditer"
	{
		//ici on fait un formulaire avec un select pour récupérer les logins et mdp de la base de données, l'utilisateur peut les modifier et on renvoie vers une page update.php qui lui montre mise à jour
		if (isset($id_utilisateur)) 
		{
		$id_utilisateur = $_GET['id_utilisateur'];	
		$resultat = mysqli_query($bdd, "SELECT nom, login, password FROM users where id_utilisateur = \"$id_utilisateur\"");

			while($donnees = mysqli_fetch_assoc($resultat)) 		
			{
				$nom = $donnees['nom'];
				$login = $donnees['login'];
				$password = $donnees['password'];
			}
		}
	
		echo '<form method = "post" action = "update.php">   
		nom : <input type = "text" name= "nom" value = "'.$nom.'" size = "12"><br>
		login : <input type = "text" name= "login" value = "'.$login.'" size = "12"><br>
		password : <input type= "text" name= "password" value = "'.$password.'" size= "12">
		<input type="hidden" name="id_utilisateur" value="'.$id_utilisateur.'">
		<input type="radio" name="valeur" value="Administrateur" checked> Administrateur </a><br>
        <input type="radio" name="valeur" value="Utilisateur"> Utilisateur</a><br><br>
		<input type = "submit" value = "OK">
		</form>';	 //Formulaire avec les valeurs que l'on peut modifier	
		
	}
	
		
	if (isset($id_utilisateur)) 
	{
		if($_GET['action']=='supprimer')  //si on clique sur "supprimer"
	{
		$id_utilisateur = $_GET['id_utilisateur'];
		$resultat = mysqli_query($bdd, "DELETE FROM users WHERE id_utilisateur = \"$id_utilisateur\"");  //on supprime les utilisateurs où l'id est celui de la ligne voulu
		if($donnees = mysqli_fetch_assoc($resultat)) header('Location : administrateur.php');
		
	}
	}
	
}

else //Sinon on affiche le tableau
  
  {
echo "<div align='center'>";
echo "<h1> Section Administrateur </h1>";
echo '<img class ="admin" src="img/administrateur.png" width="70" height="70" />';	  
$resultat = mysqli_query($bdd, "SELECT * FROM users");
if($donnees = mysqli_fetch_assoc($resultat)) { 

echo "<!DOCTYPE html> 
<table border=2>

   <tr>
     <th>id_utilisateur</th>
	 <th>nom</th>
	 <th>prenom</th>
     <th>login</th>
	 <th>password</th>
	 <th>groupe</th>
	</tr>
</div>";
//Formation du tableau

while ($donnees = mysqli_fetch_array($resultat)) { //Affichage du tableau
	
		$id_utilisateur = $donnees['id_utilisateur'];
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