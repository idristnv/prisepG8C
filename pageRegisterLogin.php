<?php
session_start();// pour les messages d'erreur crée par le client
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Prisep</title>
  <link rel="stylesheet" href="stylesheet/pageRegisterLogin.css">
</head>
<body>
  <p><img src="styleSheet/image/logoSite.png"  id="logoPrisep" alt="logo"></p>

  <h1>Prisep</h1>
  <div id="divOfConnectionAndRegistration">
    <div class="divOfConnectionMode" style="height: 420px;">
      <h2>Connectez-vous</h2>
      <form action="pageLogin_validation.php" method="post">
        <label>Adresse mail:</label>
        <br>
        <input type="Email" name="inputEmailToConnect" required>
        <?php if (ISSET($_SESSION['emailNonExistant'])){
          if(!$_SESSION['emailNonExistant']){
          echo '<p style="color:red;">Adresse mail inconnue de nos services</p>';
          }
        }
        ?>
        <br>
        <label>Mot de passe:</label>
        <br>
        <input type="password" name="inputMotDePasseToConnect" required>
        <?php if (ISSET($_SESSION['motDePasseCorrect'])) {
          if(!$_SESSION['motDePasseCorrect']){
          echo '<p style="color:red;">Mot de passe incorrect</p>';
          }
        }
        ?>
        <p><a href="pagePasswordForgotten.php">Mot de passe oublié?</a></p>
        <input type="submit" value="Se connecter">
      </form>
    </div>
    <div class="divOfConnectionMode">
      <h2>S'inscrire</h2>
      <form name="formRegistration" action="pageRegister_validation.php" method="post">
        <!-- enfaite ca enleve les required et autre truc du genre min,max,... onsubmit="return validateRegistration()" -->
        <label>Nom:</label>
        <input type="text" name="inputNom" placeholder="Tapper ici votre nom" required>

        <label>Prénom:</label>
        <input type="text" name="inputPrenom" required title=" inscrivé ici votre prénom">

        <label>Adresse mail:</label>
        <input type="Email" name="inputEmail" required >
        <?php if (ISSET($_SESSION['emailExistant'])) {
          if($_SESSION['emailExistant']){
          echo '<p style="color:red;">Adresse mail deja utilisée, veuillez en renseigner une nouvelle ou cliqué sur "mot de passe oublié"</p>';
          }
        }
        ?>

        <div><label>Date de naissance:</label>
        <input style="width: 200px" type="Date" name="inputDateDeNaissance" min="1900-12-31" max="2000-12-31" required>
        </div>
        <label>Mot de passe:</label>
        <input type="password" name="inputMotDePasse" required minlength="8">

        <div><p><a href="pageGCU.html" style="color: blue;">Conditions générales d'utilisation</a></p>

        <input type="checkbox" name=checkboxGcu required>J'ai lu et j'accepte les conditions générales d'utilisation.</div>
        </br>
        <input type="submit" name="" value="Confirmer l'inscription">
      </form>
      <?php if (ISSET($_SESSION['inscriptionValider'])) {
          if($_SESSION['inscriptionValider']){
          echo '<script type="text/javascript">alert("Vous etes inscrit!");
                </script>';
          }
        }
      ?>
    </div>

  </div>


 <!-- ancien code pour se souvenir des iframes
  <div class="doubleContainer">
    <iframe src="iframeRegister.php" height="500 px" scrolling="no"></iframe>
    <iframe src="iframeConnection.php" height="300 px" scrolling="no" style="margin-top: 100px"></iframe>
  </div> -->

  <footer >

  </footer>
</body>

<script type="text/javascript"> //regarder a quoi sert le type
  //<![CDATA] //a quoi ça pourrait servir
  function validateRegistration(){
    //si la valeur du mot de passe est non vide
    if (document.formRegistration.inputPassword.value !="") {
      alert('Vous pouvez vous connecter à present')
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
