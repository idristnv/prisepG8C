<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer


$reponse = $bdd->prepare('INSERT INTO maison (nomResidence, adresse, adresseMail) VALUES(?, ?, ?)');

$reponse->execute(array($_POST['NomMaison'],$_POST['Adresse'],'f'));




$reponse->closeCursor();




// Redirection du visiteur vers la page d'inscription
header('Location: ../pageAddHome.php');