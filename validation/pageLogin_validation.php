<?php
session_start();
$_SESSION['emailNonExistant']=false;
$_SESSION['motDePasseCorrect']=false;

// Connexion à la base de données
try{
  $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->query('SELECT * from utilisateur');

  //on regarde si l'addresse mail est deja enregistré
  while ($donnee = $req->fetch()){
    if ($donnee['adresseMail']==$_POST['inputEmailToConnect']){
      $_SESSION['emailNonExistant']=true;
      if (password_verify($_POST['inputMotDePasseToConnect'],$donnee['motDePasse'])){
        $_SESSION['motDePasseCorrect']=true;
        //crée des variables pour plus tard
        $_SESSION['adresseMail']=$donnee['adresseMail'];
        $_SESSION['prenom']=$donnee['prenom'];
        $role=$donnee['role'];
      }
    }
  }

}catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}
// Redirection du visiteur vers la page d'inscription
if($_SESSION['emailNonExistant'] AND $_SESSION['motDePasseCorrect']){
  if($role=='administrateur'){
    header('Location: ../pageAdminMenu.php');
  }else if($role=='client') {
    header('Location: ../pageUserMenu.php');
  }
  
}else{
  header('Location: ../pageRegisterLogin.php');
}
$req->closeCursor();

