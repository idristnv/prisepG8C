<?php
session_start();
$_SESSION['motDePasseCorrect']=false;
$passcryp = password_hash($_POST['nouvmotdepasse'], PASSWORD_DEFAULT);
$marequete = 'UPDATE utilisateur SET motDePasse = \''.$passcryp.'\' WHERE utilisateur.adresseMail = \''.$_SESSION['adresseMail'].'\'';

try{
   $bdd = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   $req = $bdd->query('SELECT adresseMail,motDePasse from utilisateur');

while ($donnee = $req->fetch()){
      if (password_verify($_POST['mdpcheck'],$donnee['motDePasse'])){
        $_SESSION['motDePasseCorrect']=true;

        // var_dump($marequete);
        $req2 = $bdd->query($marequete);
        $req2->closeCursor();
        }
    }

$req->closeCursor();


}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

header('Location:changermotdepasse.php');

