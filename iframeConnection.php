<?php
session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>
<!-- https://www.w3schools.com/w3css/w3css_input.asp -->
<head>
  <title>Prisep Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background: white;">
  <form class="w3-container" >
    <br>
    <label>Adresse mail</label>
    <input class="w3-input w3-animate-input  w3-hover-grey" style="width:50%" type="text">

    <label>Mot de passe</label>
    <input class="w3-input w3-animate-input  w3-hover-grey" style="width:50%" type="text">
    <br>
    <p><a href="">Mot de passe oublié?</a></p>
    <br>
    <button class="w3-btn w3-blue">Se connecter</button>


  </form>
</body>
</html>
