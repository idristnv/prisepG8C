<?php
session_start();
try{
  $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  $reqInsertion = $bdd->prepare('INSERT INTO multiprise (idMultiprise,nomMultiprise,idPiece) VALUES(?,?,?)');

  $reqInsertion->execute(array(
  htmlspecialchars($_POST['idMultiprise']),htmlspecialchars($_POST['nomMultiprise']),
  htmlspecialchars($_SESSION['idPiece']),)
);
  $reqInsertion->closeCursor();

}catch(Exception $e){
  die( 'Erreur : '.$e->getMessage() );
}

  header('Location: ../pageMultiprise.php');