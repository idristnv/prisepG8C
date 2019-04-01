<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="">
</head>
<body>
  <?php
  try{
    $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch (Exception $e){

    die('error:'.$e->getMessage());
  }

  $requeteSQL = $bddAPP->query('SELECT nomResidence,adresse,nombrePiece FROM Maison WHERE adresseMail=\''.$_SESSION['adresseMail'].'\'' );

  while ( $donnee = $reponse->fetch()) {
    print_r($donnee);
  ?>
  <div class="divMaison" >
    <h4><?php echo $donnee['nomResidence'] ?></h4>
    <p><?php echo $donnee['adresse'] ?></p>
    <p><?php echo $donnee['nombrePiece'] ?></p>
  </div>

  <?php
  }//fin de la boucle while
  $requeteSQL->closeCursor();
  ?>
</body>


</html>
