<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']); //le htmlspecialchars empeche les balises html de s'activé par ex: <script>

setcookie('email',$_POST['inputEmail'],time() + 365*24*3600, null, null, false, true);//le dernier true est pour pas que le cookies soit recuperable par du javascript, en version simple:<?php setcookie('prenom', 'mykola', time() + 365*24*3600);
setcookie('password',$_POST['inputPassword'],time() + 365*24*3600, null, null, false, true);

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php include("barre de navigation.html");
  ?>
  <p>methode cookie: adresse mail:<?php echo $_COOKIE['email'];?> ton mdp est <?php echo $_COOKIE['password'];?></p>
  <p>methode cookie: ton mdp est <?php echo $_COOKIE['password'];?></p>


  <p>methode session: salut <?php echo $_SESSION['prenom'];?> </p>


</body>
</html>

