<?php

$dir = "C:/wamp64/www/TP4/Test/Fichiers/"; //Définit le chemin du dossier où sont les fichiers

foreach (glob($dir."*") as $file) //Boucle pour balayer tous les fichiers du dossier 	
	{

	//Le temps est exprimé en secondes, 864 000 = 10 jours
	
   if(time() - filectime($file) > 864000)   //Condition si la date est suppérieure à la date d'enregistrement du fichier de plus de 10 jours 

     {
        unlink($file); //Alors on supprime les fichiers
     }
  }
  
echo "Suppresion terminée !";

?>




