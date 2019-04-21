<?php
session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
  <link rel="stylesheet" href="stylesheet/pageUserMenu.css">
</head>
<body>

  <?php //include("barre de navigation.html");?>

  <h1>Vos demeures</h1>

  <div class="divFlexDisplay"> <!--pour le responsive -->
    <?php
    try{
      $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
      die('error:'.$e->getMessage());
    }
    $requeteSQL = $bddAPP->query(
      'SELECT m.*, p.nomPiece FROM maison m
      INNER JOIN piece p
      ON p.idResidence = m.idResidence
      WHERE m.adresseMail="'.$_SESSION['adresseMail'].'"'
      );
      
    $donnee = $requeteSQL->fetch();
    while($donnee){
    ?>
      <div class="divMaison" >
        <h2><?php echo $donnee['nomResidence'] ?></h2>
        <p class="adresse">adresse: <?php echo $donnee['adresse'] ?></p>
        <div class="divFlexDisplay">
          <?php 
          $currentResidence=$donnee['nomResidence'];
          while( $donnee['nomResidence']==$currentResidence ){
          ?>
            <p class="nomPiece"><?php echo $donnee['nomPiece']?></p>
            
          <?php
            $donnee = $requeteSQL->fetch();
          } 
          ?>
        </div>
      </div>
  
    <?php
    }//fin de la boucle while
    $requeteSQL->closeCursor();
    ?>

    <div id="divAjoutMaison">
      <!-- on ajoute la possibilité d'ajouté une maison a la toute fin -->
      <a href="pageAddHome.php"><img src="stylesheet/ICON_PLUS.png" 
      alt="ajouter une maison" style="float:left; width:13vw;"></a>
      <p>
        Si vous souhaitez ajouter une demeure, prevoyé
        le nom, l'adresse et le nombre de pièce de celle-ci,
        ensuite il vous suffit de cliquer sur le bouton "+" et
        de remplir le formulaire. Vous serez automatiquement 
        redirigé vers cette page une fois l'enregistrement de la demeure terminé.
      </p>
    </div>
  </div>


</body>
</html>

