<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Multiprise</title>
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
      'SELECT mu.*, p.nomPiece, m.nomResidence
      FROM multiprise mu
      RIGHT JOIN piece p ON p.idPiece = mu.idpiece
      RIGHT JOIN maison m ON p.idResidence = m.idResidence
      WHERE m.adresseMail="'.$_SESSION['adresseMail'].'" 
      AND m.idResidence="'.$_GET['idResidence'].'" 
      AND p.idPiece="'.$_GET['idPiece'].'"'
      );
      
    $donnee = $requeteSQL->fetch();
    ?>
    <div id="divMaisonPiece">
      <h1><?=$donnee['nomResidence'].'<br>'.$donnee['nomPiece']?></h2>
    </div>
   
    <?php
    while($donnee){
    ?>
      <div class="divMultiprise" >
        <!-- ce qu'on affiche de la multiprise -->
        <h2 class="nomMultiprise"><?=$donnee['nomMultiprise'] ?></h2>
        <div class="divIcones">
          <button ><img src="stylesheet/image/iconOn" alt="icone On/Off"></button>
          <!-- changer celui la pour les alertes -->
          <button><?php echo '<img src="stylesheet/image/iconAlertOn" alt="notification activé">'; ?></button>
          <p>Allumé depuis: <?= $donnee['switchedOnAt'] ?></p> <!--date("G:i:s")-->
          <?php 
            if($donnee['capteurLuminosite']){
              echo '<img src="stylesheet/image/iconLightOn" alt="lumière détecté">';
            }else {
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
              <a href=""> <img <?= "src='stylesheet/image/iconOn'" ?> > </a>
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
        Si vous souhaitez ajouter une multiprise, relevez le numéro de serie
        en dessous de la multiprise et prévoyez un nom à celle-ci, ensuite 
        il vous suffit de cliquer sur le bouton "+" et de remplir le formulaire. 
        Vous serez automatiquement redirigé vers cette page une fois 
        l'enregistrement de la multiprise terminé.
      </p>
    </div>
  </div>
   
</body>
<?php include("Footer.html") ?>
</html>