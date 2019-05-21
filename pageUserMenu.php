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

  <?php include("navigationBar.html");?>

  <h1>Vos demeures</h1>

  <div class="divFlexDisplay"> <!--pour le responsive -->
    <?php
    try{
      $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
      die('error:'.$e->getMessage());
    }
    $requeteSQL = $bddAPP->query(
      'SELECT m.*, p.* FROM maison m
      LEFT JOIN piece p
      ON p.idResidence = m.idResidence
      WHERE m.adresseMail="'.$_SESSION['adresseMail'].'" ORDER BY m.idResidence '
      );
      
    $donnee = $requeteSQL->fetch();
    while($donnee){
    ?>
      <div class="divHome" >
        <h2><?= $donnee['nomResidence'] ?></h2>
        <p class="adresse">Adresse: <?= $donnee['adresse'] ?></p>
        <div class="divFlexDisplay">
          <?php 
          $currentResidenceName=$donnee['nomResidence'];
          $currentResidenceId=$donnee['idResidence'];
          while( $donnee['nomResidence']==$currentResidenceName ){
          ?>
            <p class="nomPiece"><a style="text-decoration:none;" href="pageMultiprise.php?idResidence=<?= $donnee['idResidence'].'&idPiece='.$donnee['idPiece']?>">
            <?= $donnee['nomPiece']?></a></p>
            
            
          <?php
            $donnee = $requeteSQL->fetch();
          }
          ?>
          <form class="addRoomForm" action="validation/addRoom_Validation.php?idResidence=<?=$currentResidenceId?>" method="post">
            <input type="text" name="roomNameInput" required placeholder="Inscrivez ici le nom de la pièce à ajouter">
            <input type="image" src="stylesheet/ICON_PLUS.png"   value="">
          </form>
        </div>
      </div>
  
    <?php
    }//fin de la boucle while
    $requeteSQL->closeCursor();
    ?>

    <div id="divAddHome">
      <!-- on ajoute la possibilité d'ajouté une maison a la toute fin -->
      <a href="pageAddHome.php"><img src="stylesheet/ICON_PLUS.png" 
      alt="ajouter une maison" ></a>
      <p>
        Pour ajouter une maison, cliquer sur le bouton "+" et
        remplissez le formulaire. Vous serez automatiquement 
        redirigé vers cette page une fois l'enregistrement de la demeure terminé.
      </p>
    </div>
  </div>


</body>
<?php include("footer.html") ?>
</html>

