<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$reponse = $bdd->prepare('INSERT INTO maison (nomResidence, adresse, adresseMail) VALUES(?, ?, ?)');

	$adresse= $_POST['Adresse'] . ' ' . $_POST['CodePostal']. ' ' . $_POST['Ville'];

	$reponse->execute(array($_POST['NomMaison'],$adresse,$_SESSION['adresseMail']));

	$reponse->closeCursor();

}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
header('Location: ../pageUserMenu.php');