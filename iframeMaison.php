<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="stylesheet/iframeMaison.css">
</head>
<body>
  <?php
  try{
    $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch (Exception $e){

    die('error:'.$e->getMessage());
  }
  $requeteSQL = $bddAPP->query('SELECT nomResidence,adresse,nbPiece,adresseMail FROM maison');

  while ( $donnee = $requeteSQL->fetch() ){
    if ( $donnee['adresseMail']==$_SESSION['adresseMail']){
  ?>
  <div class="divMaison" >
    <h4><?php echo $donnee['nomResidence'] ?></h4>
    <p>adresse: <?php echo $donnee['adresse'] ?></p>
    <p><?php echo $donnee['nbPiece'] ?>pièces</p>
  </div>

  <?php
    }
  }//fin de la boucle while
  $requeteSQL->closeCursor();
  ?>
  <a href="pageAddHome.php"><img src="stylesheet/ICON_PLUS.png" alt="ajouter une maison"></a>

</body>


</html>
