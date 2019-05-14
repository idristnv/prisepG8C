<?php
  session_start();
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $reqInsertion = $bdd->prepare('INSERT INTO piece (nomPiece,idResidence) VALUES(?, ?)');
    $reqInsertion->execute(array(htmlspecialchars($_POST['roomNameInput']),htmlspecialchars($_GET['idResidence'])));
    $reqInsertion->closeCursor();

  }catch(Exception $e){
    die( 'Erreur : '.$e->getMessage() );
  }

  header('Location: ../pageUserMenu.php');