<?php
session_start();

echo '<a href="http://projets-tomcat.isep.fr:8080/clientVaadin/">link site pour voir les trames</a>';

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=008C');//attention" e/?A" pas "e?A" 
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);/*
echo "Raw Data:<br />";
echo("$data");
*/

/*
$data = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=0G8E');
echo $data;
*/

$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
$size=count($data_tab);
$debutBoucle = $size-4;
for($i=$debutBoucle; $i<$size; $i++){
  //echo "Trame $i: $data_tab[$i]<br />"; //code de base qui affiche la trame
  //la suite du code c'est moi qui l'ai ajouté 
  $trame = $data_tab[$i];
  echo $trame."<br/> ";
  $nomCapteur = substr($trame,14,3);
  $valCapteur = substr($trame,12,1);
  echo 'Capteur:'.$nomCapteur."/état:".hexdec( $valCapteur).'<br/>';

}



$trame = $data_tab[1];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
//echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
echo("<br />$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Prisep</title>
    <link rel="stylesheet" href="stylesheet/pageRegisterLogin.css">
  </head>
  <body>
    <p><img src="styleSheet/image/logoSite"  id="logoPrisep" alt="logo"></p>

    <h1>Prisep</h1>
    <div id="divOfConnectionAndRegistration">
      <div class="divOfConnectionMode" style="height: 420px;">
        <h2>Connectez-vous</h2>
        <form action="validation/pageLogin_validation.php" method="post">
          <label>Adresse mail:</label>
          <br>
          <input type="Email" name="inputEmailToConnect" required>
          <?php if (ISSET($_SESSION['emailNonExistant'])){
            if(!$_SESSION['emailNonExistant']){
            echo '<p style="color:red;">Adresse-mail inconnue de nos services</p>';
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
        <h2>Inscrivez-vous</h2>
        <form name="formRegistration" action="validation/pageRegister_validation.php" method="post">
          <!-- enfaite ca enleve les required et autre truc du genre min,max,... onsubmit="return validateRegistration()" -->
          <label>Nom:</label>
          <input type="text" name="inputNom" placeholder="Entrer votre nom ici" required>

          <label>Prénom:</label>
          <input type="text" name="inputPrenom" required title="Inscrivez ici votre prénom">

          <label>Adresse mail:</label>
          <input type="Email" name="inputEmail" required >
          <?php if (ISSET($_SESSION['emailExistant'])) {
            if($_SESSION['emailExistant']){
            echo '<p style="color:red;">Adresse-mail deja utilisée, veuillez en renseigner une nouvelle ou cliquer sur "mot de passe oublié"</p>';
            }
          }
          ?>

          <div><label>Date de naissance:</label>
          <input style="width: 200px" type="Date" name="inputDateDeNaissance" min="1900-12-31" max="<?php echo date("Y")-18;echo date("-m-d");?>" required>
          </div>
          <label>Mot de passe:</label>
          <input type="password" name="inputMotDePasse" placeholder="Minimum 8 caractères" required minlength="8">

          <div><p><a href="pageGCU.php" style="color: blue;">Conditions générales d'utilisation</a></p>

          <input type="checkbox" name=checkboxGcu required>J'ai lu et j'accepte les conditions générales d'utilisation.</div>
          <br>
          <input type="submit" name="" value="Confirmez l'inscription">
        </form>
        <?php if (ISSET($_SESSION['inscriptionValider'])) {
            if($_SESSION['inscriptionValider']){
            echo "<p>Une personne est deja inscrit sur cet ordinateur</p>"
            // '<script type="text/javascript">alert("Vous etes inscrit!");</script>'
            ;
            }
          }
        ?>
      </div>

    </div>
  </body>
  <?php include("Footer.html") ?>

  
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
