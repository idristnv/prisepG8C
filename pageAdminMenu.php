<?php
session_start(); 
try{
  $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch (Exception $e){
  die('error:'.$e->getMessage());
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Menu administrateur</title>
  <link rel="stylesheet" href="stylesheet/pageAdminMenu.css">
</head>
<body>
  <?php include("navigationBarAdmin.html");?>
  <br> <br>
  <h1> Espace Administrateur </h1>
<br>
<br>
<br>
<br>
  <div class="info">
    <h2> Informations générales</h2>
    <br>
    <p>Le nombre <strong>d'utilisateur(s) </strong> actuel est de : <?php
      $requeteSQL = $bddAPP->query('SELECT COUNT(DISTINCT adresseMail) AS userNb FROM utilisateur');
      echo($requeteSQL->fetch()["userNb"]);
      $requeteSQL->closeCursor();
    ?>
    </p>
  
    <p>Le nombre de <strong>maison(s)</strong> enregistrée(s) est de : <?php
      $requeteSQL2 = $bddAPP->query('SELECT COUNT( idResidence) AS info FROM maison');
      echo($requeteSQL2->fetch()["info"]);
      $requeteSQL2->closeCursor();
    ?>
    <br>
    <p>Le nombre de <strong>multiprise(s)</strong> enregistrée(s) est de : <?php
      $requeteSQL3 = $bddAPP->query('SELECT COUNT( idMultiprise) AS info FROM multiprise');
      echo($requeteSQL3->fetch()["info"]);
      $requeteSQL3->closeCursor();
    ?>
    </p>
  </div>

  <br><br><br><br>
  

  <br>
  <br>
  <br>
  <?php include("Footer.html") ?>
</body>
</html>