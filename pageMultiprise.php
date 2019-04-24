<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Multirpise</title>
</head>
<body>
<div class="divFlexDisplay"> <!--pour le responsive -->
    <?php
    try{
      $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
      die('error:'.$e->getMessage());
    }
    $requeteSQL = $bddAPP->query(
      'SELECT mu.*, p.nomPiece, m.nomResidence
      FROM multiprise mu
      INNER JOIN piece p ON p.idPiece = mu.idpiece
      INNER JOIN maison m ON p.idResidence = m.idResidence
      WHERE m.adresseMail="'.$_SESSION['adresseMail'].'" 
      AND m.idResidence="'.$_GET['idResidence'].'" 
      AND p.idPiece="'.$_GET['idPiece'].'"'
      );
      
    $donnee = $requeteSQL->fetch();
    print_r($donnee);
    ?>
    <div id="divMaisonPiece">
      <h2> <?php echo $donnee['nomResidence'] ?></h2>
      <h3><?php echo $donnee['nomPiece']?></h3>
    </div>
   
    <?php
    while($donnee){
    ?>
      <div class="divMultiprise" >
        <!-- ce qu'on affiche de la multiprise -->
        <h2><?php echo $donnee['nomMultiprise'] ?></h2>
        


        <div class="divFlexDisplay">
          <?php 
          $currentMultiprise=$donnee['idMultiprise'];
          while( $donnee['idMultiprise']==$currentMultiprise ){
          ?>
            <!-- faire ici le include pour les prises -->
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

    <div id="divAjoutMultiprise">
      <a href="pageAddMultiprise.php"><img src="stylesheet/ICON_PLUS.png" 
      alt="ajouter une multiprise" style="float:left; width:13vw;"></a>
      <p>
        Si vous souhaitez ajouter une multiprise, relevez le numéro de serie
        en dessous de la multiprise et prévoyez un nom à celle-ci, ensuite 
        il vous suffit de cliquer sur le bouton "+" et de remplir le formulaire. 
        Vous serez automatiquement redirigé vers cette page une fois 
        l'enregistrement de la multiprise terminé.
      </p>
    </div>
  </div>
   
</body>
</html>