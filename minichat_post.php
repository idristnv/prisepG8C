<?php
session_start();
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
$ticketfinal = $bdd->query('SELECT numTicket FROM Ticket ORDER BY numTicket DESC');
$req = $bdd->prepare('INSERT INTO message (adresseMail, numTicket, texte) VALUES(?, ?, ?)');

while ($dernierticket = $ticketfinal->fetch()){
        if ($dernierticket['numTicket'] == $_POST['numTicketURL']){
                $req->execute(array($_SESSION['adresseMail'], $dernierticket['numTicket'], $_POST['texte'])); //mail a remplacer par la session de l'individu
        }
}

$envoi = $bdd->query('SELECT adresseMail, texte, numTicket FROM message ORDER BY messageNB ASC');

$req->closeCursor();
$ticketfinal->closeCursor();
// Redirection du visiteur vers la page du minichat
$fticket = $_POST['numTicketURL'];
header("Location: minichat.php?ticket=".$fticket);
?>
