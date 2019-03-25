<?php
session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Prisep</title>
  <link rel="stylesheet" href="stylesheet/connectionStyle.css">
</head>
<body>

<!--
  <div>
    <h2>Connectez-vous</h2>
    <form class="w3-container" >
      <br>
      <label>Adresse mail</label>
      <input type="text">

      <br>
      <label>Mot de passe</label>
      <input type="text">

      <p><a href="">Mot de passe oublié?</a></p>
      <br>
      <button>Se connecter</button>
    </form>
  </div>
-->

  <p><img src="image/logoSite.png" alt="logoSite" id="logoPrisep"></p>
  <h1>Prisep</h1>
  <div class="doubleContainer">
    <h2>S'inscrire</h2>
    <h2>Connectez-vous</h2>
  </div>

  <div class="doubleContainer">
    <iframe src="iframeRegister.php" height="500 px" scrolling="no"></iframe>
    <iframe src="iframeConnection.php" height="300 px" scrolling="no" style="margin-top: 100px"></iframe>
  </div>
  <footer style="display:flex;">

  </footer>
</body>
</html>
