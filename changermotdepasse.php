<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Prisep</title>
    <link rel="stylesheet" href="stylesheet/newmdp.css">
  </head>

<body>
<?php include("navigationbar.html");?>
<div class="mdp">
<h2>Changer de mot de passe</h2>
<form action="changermotdepasse_post.php" method="post">
<br>
<label>Mot de passe actuel</label>
<input type="password" name="mdpcheck" required>
<?php if (ISSET($_SESSION['motDePasseCorrect'])) {
            if(!$_SESSION['motDePasseCorrect']){
            echo '<p style="color:red;">Mot de passe incorrect</p>';
            }
          }
?>
<br>
<label>Nouveau mot passe</label>
<input type="password" name="nouvmotdepasse" placeholder="Minimum 8 caractères" required minlength="8">
<br>
<input type="submit" style="font-size:1.5vw; border-radius: 3vw; padding: 0.5vw 1vw; border: 0.15vw solid #3E4866; width: 25%; margin-left: 37.5%;" value="Changer">
</form>
</div>
</body>
<?php include("Footer.html");?>
</html>