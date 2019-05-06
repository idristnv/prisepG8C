<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO ticket (mailUser, mailAdmin) VALUES(?, ?)');
$req->execute(array('valentinnajean@isep.fr', 'admin@admin.com')); //mails a remplacer par la session de l'individu
$req->closeCursor();
// Redirection du visiteur vers la page du minichat


$listTicket = $bdd->query('SELECT numTicket, mailUser FROM ticket ORDER BY numTicket DESC');
$donnTick = $listTicket->fetch();

$listTicket->closeCursor();

$flastticket = $donnTick['numTicket'];
header('Location: minichat.php?ticket='.$flastticket);
?>