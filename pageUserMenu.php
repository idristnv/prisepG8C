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
  <title>Document</title>
</head>
<body>

  <?php include("barre de navigation.html");
  ?>
  <p>methode session: salut <?php echo $_SESSION['prenom'];?> </p>
  <?php
    if (isset($_COOKIE['email'])) {
      echo '<p>ton adresse mail est '.$_COOKIE['email'].'</p>';
    }
    if (isset($_COOKIE['password'])) {
      echo '<p>ton mot de passe est '.$_COOKIE['password'].'</p>';
    }
   ?>




</body>
</html>

