

<!DOCTYPE html>
<html>
<!-- https://www.w3schools.com/w3css/w3css_input.asp -->
<head>
  <title>Prisep Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background: white;">
  <form class="w3-container" action="pageUserMenu.php" method="post">

    <br>
    <label>Nom</label>
    <input class="w3-input w3-animate-input  w3-hover-grey" style="width:50%" type="text" name="nom">

    <label>Prénom</label>
    <input class="w3-input w3-animate-input  w3-hover-grey" style="width:50%" type="text" name="prenom" >

    <label>Adresse mail</label>
    <input class="w3-input w3-animate-input  w3-hover-grey" style="width:50%" type="text"
    name="mail">

    <label>Date de naissance</label>
    <input class="w3-input   w3-hover-grey"  style="width: 180px" type="Date" min="1900-12-31" max="2000-12-31" name="dateDeNaissance">

    <label>Mot de passe</label>
    <input class="w3-input w3-animate-input  w3-hover-grey" style="width:50%" type="password" name="postPassword">

    <p><a href="gcu.html" style="color: blue;">Conditions générales d'utilisation</a></p>
    <input type="checkbox" name=checkboxGcu>   J'ai lu et j'accepte les conditions générales d'utilisation.<br>
    </br>
    <button class="w3-btn w3-blue">Confirmer l'inscription</button>

</form>


</body>
</html>
