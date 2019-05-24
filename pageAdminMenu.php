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
  <?php include(".html");?>
  <div id="info">
    <p>Le nombre d'utilisateur actuelle:<?php
      $requeteSQL = $bddAPP->query('SELECT COUNT(DISTINCT adresseMail) AS userNb FROM utilisateur');
      echo($requeteSQL->fetch()["userNb"]);
      $requeteSQL->closeCursor();
    ?>
    </p>
    <p>Le nombre de residence:<?php
      $requeteSQL2 = $bddAPP->query('SELECT COUNT( idResidence) AS info FROM maison');
      echo($requeteSQL2->fetch()["info"]);
      $requeteSQL2->closeCursor();
    ?>
    <p>Le nombre de multiprise:<?php
      $requeteSQL3 = $bddAPP->query('SELECT COUNT( idMultiprise) AS info FROM multiprise');
      echo($requeteSQL3->fetch()["info"]);
      $requeteSQL3->closeCursor();
    ?>
    </p>
  </div>
  <?php include("Footer.html") ?>
</body>
</html>