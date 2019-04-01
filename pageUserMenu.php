<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['prenom'] = htmlspecialchars($_POST['inputPrenom']); //le htmlspecialchars empeche les balises html de s'activé par ex: <script>

if (!isset($_COOKIE['email'])) {
  setcookie('email',$_POST['inputEmail'],time() + 365*24*3600, null, null, false, true);//le dernier true est pour pas que le cookies soit recuperable par du javascript, en version simple:<?php setcookie('prenom', 'mykola', time() + 365*24*3600);
}
if (!isset($_COOKIE['password'])) {
  setcookie('password',$_POST['inputPassword'],time() + 365*24*3600, null, null, false, true);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
</head>
<body>

  <?php include("barre de navigation.html");?>

  <div id="divAlert">
    <h2>Alertes</h2>
    <div>
      <h3>Consommation:</h3>
      <iframe src="iframeConsomationAlert.php" height="200 px"></iframe>
    </div>

    <div>
      <h3>Temperature:</h3>
      <iframe src="iframeTemperatureAlert.php" height="200 px"></iframe>
    </div>
  </div>

  <div>
    <h2>Vos demeures:</h2>
    <iframe src="iframeMaison.php" height="500 px"></iframe>
  </div>

  <p>methode session: salut <?php echo $_SESSION['prenom'];?> </p>
  <?php
    if (isset($_COOKIE['email'])) {
      echo '<p>ton adresse mail est '.$_COOKIE['email'].'</p>';
    }
    if (isset($_COOKIE['password'])) {
      echo '<p>ton mot de passe est '.$_COOKIE['password'].'</p>';
    }
  ?>
  <br><br>
  <?php
    try{
      $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));//les derniers sont d'id de phpMyAdmin et le mot de passe et l'array c'est pour montrer les erreurs plus clairement, PDO est une extension de PHP
    }catch (Exception $e){
      die('error:'.$e->getMessage());
    }

    $reponse = $bdd->query('SELECT nom,console,prix FROM jeux_video WHERE possesseur=\'Patrick\' ORDER BY prix DESC LIMIT 4,4' );
    /* 'SELECT Champs From table' $reponse contient toute la reponse MySQL sous forme d'objet.
    *WHERE possesseur="Patrick" on regarder seulement quand le champs posseur vaut Patrick
    *ORDER BY prix DESC on regarde dans l'ordre decroissant (par defaut c'est croissant et si c'est des lettre alors alphabetiquement)
    *LIMIT 4,4 recupere de la 4eme ligne a la 8huitieme
    */

    $i=1;
    echo '<H1>Patoche a acheté les jeux suivant:</H1>';
    while ( $donnee = $reponse->fetch()) {//donnee est un array renvoyé par le fetch, chaque fois qu'on boucle, fetch va chercher dans $reponse l'entree suivante et organise les champs dans l'array $donnee,fetch renvoie faux dans données lorsqu'il est arrivé à la fin des données

    if ($i==1){
      print_r( $donnee);
    }
  ?>
    <p> <?php echo $i ?>) "<?php echo $donnee['nom'] ?>" sur <?php echo $donnee['console'] ?> à<?php echo $donnee['prix'] ?> euros</p>

  <?php
    $i++;
    }
    $reponse->closeCursor();//!!!on termine le traitement de la requete, ça permet d'eviter des erreurs a la requette suivante
  ?>

  <H1>les 3 jeux les plus chere (mais a moins de <?php echo $_GET['prixMax'] ?> euros) sur <?php echo $_GET['console'] ?> sont :</H1>
  <?php
    $req = $bdd->prepare('SELECT nom,console,prix from jeux_video where console=:nomConsole AND prix<:prixMax ORDER BY prix DESC LIMIT 0,3');
    $req->execute(array('nomConsole'=>$_GET['console'],'prixMax'=>$_GET['prixMax']));

    while ($donnee = $req->fetch()) {
      echo '<p>'.$donnee['prix'].'euros : '.$donnee['nom'].'</p>';
    }
    $req->closeCursor();
   ?>



</body>
</html>

