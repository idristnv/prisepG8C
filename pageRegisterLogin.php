<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Prisep</title>
  <link rel="stylesheet" href="stylesheet/connectionStyle.css">
</head>
<body>
  <p><img src="image/logoSite.png"  id="logoPrisep" alt="logo"></p>

  <h1>Prisep</h1>
  <div id="divOfConnectionAndRegistration">
    <div class="divOfConnectionMode" style="height: 400px;">
      <h2>Connectez-vous</h2>
      <form action="pageUserMenu.php" method="post">
        <label>Adresse mail:</label>
        <br>
        <input type="Email" name="inputEmail">
        <br>
        <label>Mot de passe:</label>
        <br>
        <input type="password" name="inputPassword">
        <br>
        <p><a href="pagePasswordForgotten.php">Mot de passe oublié?</a></p>
        <input type="submit" value="Se connecter">

      </form>
    </div>
    <div class="divOfConnectionMode">
      <h2>S'inscrire</h2>
      <form name="formRegistration" action="pageUserMenu.php" method="post" onsubmit="return validateRegistration()" >
        <label>Nom</label>
        <input type="text" name="inputNom">

        <label>Prénom</label>
        <input type="text" name="inputPrenom" >

        <label>Adresse mail</label>
        <input type="Email" name="inputEmail">

        <div><label>Date de naissance:</label>
        <input style="width: 200px" type="Date" min="1900-12-31" max="2000-12-31" name="inputDateDeNaissance">
        </div>
        <label>Mot de passe</label>
        <input type="password" name="inputPassword">

        <div><p><a href="gcu.html" style="color: blue;">Conditions générales d'utilisation</a></p>

        <input type="checkbox" name=checkboxGcu>   J'ai lu et j'accepte les conditions générales d'utilisation.</div>
        </br>
        <input type="submit" onclick="alert('Vous etes inscris')" name="" value="Confirmer l'inscription">

      </form>

    </div>
  </div>


 <!-- ancien code pour se souvenir des iframes
  <div class="doubleContainer">
    <iframe src="iframeRegister.php" height="500 px" scrolling="no"></iframe>
    <iframe src="iframeConnection.php" height="300 px" scrolling="no" style="margin-top: 100px"></iframe>
  </div> -->

  <footer style="display:flex;">

  </footer>
</body>

<script type="text/javascript"> //regarder a quoi sert le type
  //<![CDATA] //a quoi sa pourrait servir

  function validateRegistration(){
    //si la valeur du mot de passe est non vide
    if (document.formRegistration.inputPassword.value !="") {
      return true;
    }
    else{
      alert("Il semblerait que vous avez oublié de saisir un mot de passe...");
      return false;
    }
  }
  //]]>

</script>

</html>
