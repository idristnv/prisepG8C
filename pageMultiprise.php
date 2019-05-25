<?php
session_start();
if(ISSET($_GET['idResidence'])){
  $_SESSION['idResidence']=$_GET['idResidence'];
}
if(ISSET($_GET['idPiece'])){
  $_SESSION['idPiece']=$_GET['idPiece'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Gestion Multiprise</title>
  <link rel="stylesheet" href="stylesheet/pageMultiprise.css">

</head>
<body>
<?php include("navigationBar.html");?>
<div class="divFlexDisplay"> <!--pour le responsive -->
    <?php
    try{
      $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
      die('error:'.$e->getMessage());
    }
    $requeteSQL = $bddAPP->query(
      'SELECT mu.*, p.*, m.*
      FROM multiprise mu
      RIGHT JOIN piece p ON p.idPiece = mu.idpiece
      RIGHT JOIN maison m ON p.idResidence = m.idResidence
      WHERE m.adresseMail="'.$_SESSION['adresseMail'].'" 
      AND m.idResidence="'.$_SESSION['idResidence'].'" 
      AND p.idPiece="'.$_SESSION['idPiece'].'"'
      );
      
    $donnee = $requeteSQL->fetch();
    $idResidence=$donnee['idResidence'];
    $idPiece=$donnee['idPiece'];

    ?>
    <div id="divMaisonPiece">
      <br>
      <h1><?=$donnee['nomResidence'].'<br>'.$donnee['nomPiece']?></h2>
    </div>
   <br><br>
    <?php
    while($donnee){
    ?>
      <div class="divMultiprise" >
        <!-- ce qu'on affiche de la multiprise -->
        <h2 class="nomMultiprise"><?=$donnee['nomMultiprise'] ?></h2>
        <div class="divIcones">
          <button onclick="window.location.href='pageButton.php?button=turnOff&idMultiprise=<?=$donnee['idMultiprise']?>'">
          <img src='stylesheet/image/icon<?php if($donnee['state']){
            echo 'On';
          }else{
            echo 'Off';
          }?>.png'
          alt="icone On/Off"></button>
          
          <!-- changer celui la pour les alertes -->
          <button  onclick="window.location.href='pageButton.php?button=alert&idMultiprise=<?=$donnee['idMultiprise']?>'">
          <img src='stylesheet/image/iconAlert<?php if($donnee['alertNotification']){
            echo 'On';
          }else{
            echo 'Off';
          }?>.png'
          alt="alert On/Off">
          
          </button>

          
         <!-- <p>Allumé depuis: <?= $donnee['switchedOnAt'] ?></p> date("G:i:s")-->
          

          <?php 
            if($donnee['capteurLuminosite']){
              echo '<img src="stylesheet/image/iconLightOn" alt="lumière détecté">';
            }else{
              echo '<img src="stylesheet/image/iconLightOff" alt="lumière non détecté">';
            }
          ?>
         
          <?php 
            if($donnee['capteurTemperature']<35){
              echo '<img src="stylesheet/image/iconTemperatureGreen" alt="temperature optimal">';
            }elseif ($donnee['capteurTemperature']<70) {
              echo '<img src="stylesheet/image/iconTemperatureOrange" alt="temperature élevé">';
            }else{
              echo '<img src="stylesheet/image/iconTemperatureRed" alt="temperature critique">';
            }
          ?>
        </div> 
            
        <div style="display:flex">
            <?php
            for($i=1;$i<=3;$i++){
            ?>
            <div class="divPlug">
              <p>prise <?=$i ?> </p>
              <button onclick="window.location.href='pageButton.php?button=alert<?=$i?>&idMultiprise=<?=$donnee['idMultiprise']?>'">
              <img src=
                <?php if($donnee['plug'.$i.'State']){
                  echo '"stylesheet/image/iconOn.png"';
                }else{
                  echo '"stylesheet/image/iconOff.png"';
                }
                ?>
              </button>
            </div>
            <?php 
            }
            ?>
        </div>
       <?php $donnee = $requeteSQL->fetch();?> 
      </div>
  
    <?php
    }//fin de la boucle while
    $requeteSQL->closeCursor();
    ?>

    <div id="divAjoutMultiprise">
      <a href="pageAddMultiprise.php"><img src="stylesheet/ICON_PLUS.png" 
      alt="ajouter une multiprise" ></a>
      <p>
        Si vous souhaitez ajouter une multiprise, cliquez sur le bouton "+" et remplissez le formulaire. 
        Pensez à relever le numéro de serie de votre multiprise. 
        Vous serez automatiquement redirigé vers cette page une fois 
        l'enregistrement de la multiprise terminé.
      </p>
    </div>
  </div>
 



</body>
<?php include("Footer.html") ?>
</html>