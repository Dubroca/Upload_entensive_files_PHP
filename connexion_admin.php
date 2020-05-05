<?php

include ("acces.inc.php");
 
 if (isset($_POST['login'])  && isset($_POST['password']))
	{
		 if ($_POST['login'] == $login_autorise && $_POST['password'] == $pass_autorise) //Condition si les variables login et password sont les mêmes que celles définies dans acces.inc
		 {
			session_start(); //démarre une session 
			$_SESSION ['login'] = $_POST['login'];
			$_SESSION ['password'] = $_POST ['password'];
			header("Location: administrateur.php"); //redirection vers une autre page
		}	
	
	 else 
		 
		{
			header("Location: erreur.php?acces=false"); //redirection vers une autre page et affiche le message d'erreur
			
		}
	}
	else 
{
	header("Location: erreur.php");
}
  
?>