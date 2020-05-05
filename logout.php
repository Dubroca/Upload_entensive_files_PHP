<?php

session_start();//démarre une session 
session_destroy(); //détruit les données de session et ferme la session
header("Location: accueil.html"); //redirection vers la première page
  
?>
