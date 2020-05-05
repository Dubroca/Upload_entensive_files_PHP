<?php

Session_start(); //démarre la session

include ('sql.php');

echo  '<a href="logout.php" class="hautdepage" title="Déconnexion">Déconnexion</a>';

echo "<h1>Bonjour"; echo ' '; 
echo $_SESSION ['login'];echo ' ';
echo "et bienvenue dans l'outil d'echange de fichiers volumineux professionnel ! </h1>"; 

$chemin_nom_fichier_destination = $_POST['chemin_nom_fichier_destination'];


echo "Votre fichier se trouve ici : $chemin_nom_fichier_destination. Il sera téléchargeable pendant 10 jours uniquement !"  

?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="test.css" />
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<title>Systeme d'echange de fichiers volumineux professionnel.</title> 
	</head>
	<body>

<p>Veuillez uploader votre fichier :</p>

<div class="row bloc-telechargement video">
    <div class="col-md-4 margin">
        <form action="recupfichier.php" method="post" enctype="multipart/form-data">
        <!-- On limite le fichier à 100Mo -->
            <input  type="hidden" name="MAX_FILE_SIZE" value="1000000000">
           <input  class="bouton-envoi" type="file" name="mon_fichier">
            <input class="bouton-import" type="submit" name="envoyer" value="Envoyer">
     </div>
 </div>
</div>
</body>

