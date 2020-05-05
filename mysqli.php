<?php

include ('sql.php');

$date = date("Y-m-d H:i:s");

$resultat = mysqli_query($bdd, "insert into chargements values ('0','$date', '0', '0')"); //On insère dans la bdd les résultats


while ($donnees = mysqli_fetch_assoc($resultat)) //Boucle while pour afficher les résultats de la requête
			{
				
			}
					
						  

		
/*$resultat = mysqli_query($bdd, "SELECT id_utilisateur, password FROM users ");


while($donnees = mysqli_fetch_assoc($resultat)) //Boucle while pour afficher les résultats de la requête		 	
			{								
						 echo $donnees['id_utilisateur'].'<br>'; 
						   					  		
			}*/
			

			
?>
