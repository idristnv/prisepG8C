<?php
session_start();

try{
	$bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	$reqInsertationMaison = $bdd->prepare('INSERT INTO maison (nomResidence, adresse, adresseMail) VALUES(?, ?, ?)');
	$adresse=$_POST['Adresse'].' '.$_POST['CodePostal'].' '. $_POST['Ville'];
	$reqInsertationMaison->execute(array($_POST['NomMaison'],$adresse,$_SESSION['adresseMail']));
	$reqInsertationMaison->closeCursor();

	$reqlastMaison = $bdd->query('SELECT * FROM maison WHERE idResidence=LAST_INSERT_ID()');
	$idResidence = $reqlastMaison->fetch();
	$reqlastMaison->closeCursor();

	$reqRoomInsertation = $bdd->prepare('INSERT INTO piece (nomPiece, idResidence) VALUES(?, ?)');
	$reqRoomInsertation->execute(array($_POST['roomNameInput'],$idResidence['idResidence']));

	$reqRoomInsertation->closeCursor();

}

catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}

header('Location: ../pageUserMenu.php');