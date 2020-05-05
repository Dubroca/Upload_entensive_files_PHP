<?php

include ('sql.php');

$date2 = date('y-m-d H:i:s', strtotime('-10 days'));  //On prend la date actuelle et on lui enlève 10 jours
// echo $date2;

$resultat = mysqli_query($bdd, "DELETE FROM chargements WHERE date < \"$date2\"");  //Requête si la date d'enregistrement du fichier est plus petite que la date d'il y a 10 jours alors on supprime les enregistrements de la bdd
			
		
echo "Suppresion terminée !";

?>