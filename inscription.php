<?php

include ('sql.php');
echo ' <link type="text/css" rel="stylesheet" href="test.css" />';

echo '<div align="center"><form method = "post" action = "insertion.php">
<h2> Inscrivez-vous ! </h2>
Nom : <input type = "text" name= "nom" size = "12"><br>
Prénom : <input type = "text" name= "prenom" size = "12"><br>          
login : <input type = "text" name= "login" size = "12"><br>
password : <input type= "text" name= "password" size= "12">
<input type="hidden" name="id_utilisateur"><br>
<input type = "submit" value = "OK">
</form></div>';
//formulaire d'inscription pour l'utilisateur

?>

