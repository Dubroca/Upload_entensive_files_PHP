<?php

Session_start(); //démarre la session
include ('sql.php'); 

$_FILES['mon_fichier']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['mon_fichier']['size'];     //La taille du fichier en octets.
$_FILES['mon_fichier']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['mon_fichier']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
$maxsize = 1500000;

if ($_FILES['mon_fichier']['error'] > 0)  //On vérifie que l'on a bien uploadé un fichier
		{	
			$erreur = "Erreur lors du transfert";		
		}
		
if ($_FILES['mon_fichier']['size'] > $maxsize) //Si le fichier est plus gros que la taille max définie
		{		
			$erreur = "Le fichier est trop gros";
		}		


$info = pathinfo($_FILES['mon_fichier']['name']);
$extension = $info['extension']; //On récupère l'extension du fichier uploadé

$date1 = date('y-m-d H-i-s'); //On met l'heure actuelle dans une variable
$chemin_nom_fichier_destination="C:/wamp64/www/TP4/test/fichiers/"."$date1".".$extension"; //Déplacement et renommage du fichier uploadé avec la date


move_uploaded_file($_FILES["mon_fichier"]["tmp_name"],$chemin_nom_fichier_destination); 

echo '<div class=header>';
echo '<link type="text/css" rel="stylesheet" href="test3.css" />';
echo "<h1>Upload terminé !</h1>";


$id_utilisateur = $_SESSION ['id_utilisateur'];

$date = date("y-m-d H-i-s"); //On met l'heure actuelle dans une variable
$nomfichier = "$date1".".$extension";

$resultat = mysqli_query($bdd, "insert into chargements values ('0','$date', '$id_utilisateur', '$nomfichier')"); //On insère dans la bdd les résultats

	
echo "Votre fichier se trouve ici : <p><font color='red'>http://localhost/TP4/Test/Fichiers/$nomfichier<br></font></p> Vous pouvez copier ce lien et l'envoyer par e-mail. Attention : Les fichiers seront supprimés dans 10 jours !<br><br>"  ; //Affichage du lien pour l'utilisateur
echo '<a href="upload.php">Retourner sur la page principale</a> ';
echo '</div>';
//On affiche le lien d'où se trouve le fichier uploadé et on renvoie vers la page principale

?>	