<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']); //le htmlspecialchars empeche les balise html de s'activé par ex: <script>
setcookie('prenom',$_POST['prenom'],time() + 365*24*3600, null, null, false, true);//le dernier true est pour pas que le cookies soit recuperable par du javascript, en version simple:<?php setcookie('prenom', 'myko', time() + 365*24*3600);
setcookie('password',$_POST['motDePasse'],time() + 365*24*3600, null, null, false, true);

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
  <p>methode cookie: salut <?php echo $_COOKIE['prenom'];?> tu es née en <?php echo $_POST['dateDeNaissance'];?> </p>
  <p>methode session: salut <?php echo $_SESSION['prenom'];?> ton mdp est <?php echo $_COOKIE['password'];?> </p>


</body>
</html>

