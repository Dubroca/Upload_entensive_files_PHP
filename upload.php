<?php

Session_start(); //démarre la session

if ($_SESSION ['groupe'] == 'Administrateur')
	{
echo '<a href="administrateur.php" class="hautdepage" title="Administrateur">Administration</a>'; //Lien visible que par les administrateurs pour gérer les utilisateurs
	}
		
echo '<a href="logout.php" class="hautdepage" title="Déconnexion">Déconnexion</a>';	

echo '<div align="center">';
echo '<img alt="" src="img/transfer.png" width="180" height="100" />';
echo "<h1>Bonjour"; echo ' '; 
echo $_SESSION ['login'];echo ' ';
echo "et bienvenue dans l'outil d'echange de fichiers volumineux professionnel ! </h1>"; //Phrase de bienvenue dans l'outil
 	
?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="test2.css" />
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<title>Système d'échange de fichiers volumineux professionnel.</title> <!-- Titre de la page -->
	</head>
	<body>
	

<p>Veuillez uploader votre fichier (max 10 Mo) :</p>


<div class="row bloc-telechargement video">
    <div class="col-md-4 margin">
        <form action="recupfichier.php" method="post" enctype="multipart/form-data">
        <!-- On limite le fichier à 100Mo -->
            <input  type="hidden" name="MAX_FILE_SIZE" value="1000000000">
           <input  class="bouton-envoi" type="file" name="mon_fichier">
            <input class="bouton-import" type="submit" name="envoyer" value="Envoyer">  <!-- Formulaire pour l'upload de fichiers -->
     </div>
	 </div>
 </div>
</div>
</body>

