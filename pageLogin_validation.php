<?php
session_start();
$adresseMailExist=false;
$motDePasseCorrect=false;
  // Connexion à la base de données
try{
  $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->query('SELECT adresseMail,motDePasse from utilisateur');

  //on regarde si l'addresse mail est deja enregistré
  while ($donnee = $req->fetch()){
    if ($donnee['adresseMail']==$_POST['inputEmailToConnect']){
      $adresseMailExist=true;
      if ($donnee['motDePasse']==$_POST['inputMotDePasseToConnect']){
        $motDePasseCorrect=true;
        $_SESSION['adresseMail']=$donnee['adresseMail'];
        $_SESSION['prenom']=$donnee['prenom'];
      }
    }
  }
  $req->closeCursor();

}catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}
// Redirection du visiteur vers la page d'inscription
if($adresseMailExist AND $motDePasseCorrect ){
  header('Location: pageUserMenu.php');
}else{
  header('Location: pageRegisterLogin.php');
}
?>

