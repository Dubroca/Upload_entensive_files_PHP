<?php
if($bdd = mysqli_connect('localhost', 'root','', 'utilisateurs'))
{
    // Si la connexion a réussi, rien ne se passe.
}
else // Mais si elle rate…
{
    echo 'Erreur'; // On affiche un message d'erreur.
}
?>