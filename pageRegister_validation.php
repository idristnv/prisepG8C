<?php
  if (!isset($_COOKIE['email'])) {
  setcookie('email',$_POST['inputEmail'],time() + 365*24*3600, null, null, false, true);//le dernier true est pour pas que le cookies soit recuperable par du javascript, en version simple:<?php setcookie('prenom', 'mykola', time() + 365*24*3600);
  }
  if (!isset($_COOKIE['password'])) {
    setcookie('password',$_POST['inputPassword'],time() + 365*24*3600, null, null, false, true);
  }



  // Connexion à la base de données
try{
  $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->query('SELECT * from utilisateur');

  //on regarde si l'addresse mail est deja enregistré
  while ($donnee = $req->fetch()){
    if ($donnee['adresseMail']==$_POST['inputEmail']){
      $dejaInscrit=true;
    }
  }
  $req->closeCursor();

  if( !$dejaInscrit ){//si ce n'est pas le cas on enregistre la personne
    // Insertion du message à l'aide d'une requête préparée
    $reqInsertion = $bdd->prepare('INSERT INTO utilisateur (adresseMail, nom, prenom, motDePasse, dateDeNaissance, role) VALUES(?, ?, ?, ?, ?, ?)');
    $reqInsertion->execute(array(htmlspecialchars($_POST['inputEmail']), htmlspecialchars($_POST['inputNom']),htmlspecialchars($_POST['inputPrenom']), htmlspecialchars($_POST['inputMotDePasse']),htmlspecialchars($_POST['inputDateDeNaissance']), 'client'));
    $reqInsertion->closeCursor();
    }
}catch(Exception $e){
  die( 'Erreur : '.$e->getMessage() );
}
// Redirection du visiteur vers la page d'inscription
header('Location: pageRegisterLogin.php');
?>

