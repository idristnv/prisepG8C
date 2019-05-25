<?php
session_start(); 

try{
  $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch (Exception $e){
  die('error:'.$e->getMessage());
}

$requeteSQL = $bddAPP->query('SELECT * FROM multiprise WHERE idMultiprise='.$_GET["idMultiprise"]);
$donnee = $requeteSQL->fetch();

$buttonNb=$_GET["button"]{strlen($_GET["button"])-1};

if($_GET["button"]=="turnOff"){
  if($donnee['state']){
    $req = $bddAPP->query('UPDATE multiprise
    SET plug1State=0, plug2State=0, plug3State=0, state=0
    WHERE idMultiprise='.$_GET['idMultiprise']);
  }else{
    $req = $bddAPP->query('UPDATE multiprise
    SET plug1State=1, plug2State=1, plug3State=1, state=1
    WHERE idMultiprise='.$_GET["idMultiprise"]);
  }

}else if($buttonNb==1 || $buttonNb==2 || $buttonNb==3){
  if($donnee['plug'.$buttonNb.'State']){
    $req = $bddAPP->query('UPDATE multiprise
      SET plug'.$buttonNb.'State=0 WHERE idMultiprise='.$_GET["idMultiprise"]);
  }else{
    $req = $bddAPP->query('UPDATE multiprise
      SET plug'.$buttonNb.'State=1 , state=1 WHERE idMultiprise='.$_GET["idMultiprise"]);
  }

}else if($_GET["button"]=="alert"){
  if($donnee['alertNotification']){
    $req = $bddAPP->query('UPDATE multiprise
      SET alertNotification=0 WHERE idMultiprise='.$_GET["idMultiprise"]);
  }else{
    $req = $bddAPP->query('UPDATE multiprise
      SET alertNotification=1 WHERE idMultiprise='.$_GET["idMultiprise"]);
  }
}

$req->closeCursor();

$requeteSQL->closeCursor();

header('Location: pageMultiprise.php?idResidence='.$_SESSION["idResidence"].'&idPiece='.$_SESSION["idPiece"].'');
