<?php
session_start();
$_SESSION['emailExistant']=false;
$_SESSION['inscriptionValider']=false;

// Connexion à la base de données
try{
  $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->query('SELECT * from utilisateur');

  //on regarde si l'addresse mail est deja enregistré
  while ($donnee = $req->fetch()){
    if ($donnee['adresseMail']==$_POST['inputEmail']){
      $dejaInscrit=true;
      $_SESSION['emailExistant']=true;//pour crée un message d'erreur

    }
  }
  $req->closeCursor();

  if( !$dejaInscrit ){//si ce n'est pas le cas on enregistre la personne
    // Insertion du message à l'aide d'une requête préparée
    $reqInsertion = $bdd->prepare('INSERT INTO utilisateur (adresseMail, nom, prenom, motDePasse, dateDeNaissance, role) VALUES(?, ?, ?, ?, ?, ?)');
    $reqInsertion->execute(array(htmlspecialchars($_POST['inputEmail']), htmlspecialchars($_POST['inputNom']), htmlspecialchars($_POST['inputPrenom']), password_hash($_POST['inputMotDePasse'], PASSWORD_DEFAULT),htmlspecialchars($_POST['inputDateDeNaissance']), 'client'));
    $reqInsertion->closeCursor();
    $_SESSION['inscriptionValider']=true;
    }
}catch(Exception $e){
  die( 'Erreur : '.$e->getMessage() );
}
// Redirection du visiteur vers la page d'inscription
header('Location: ../pageRegisterLogin.php');
?>

