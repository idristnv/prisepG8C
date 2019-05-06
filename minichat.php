<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
        <link rel="stylesheet" href="stylesheet/pageUserMenu.css">
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    <?php include("barre de navigation.html");?>

    
    <form action="minichat_post.php?ticket=<?php $_GET['ticket'] ?>" method="post">
        <p>
        <!-- <label for="pseudo">Pseudo</label> : <input type="text" name="adresseMail" id="pseudo" /><br /> -->
        <label for="message">Message</label> :  <input type="text" name="texte" id="message" /><br />
        <input type="hidden" name="numTicketURL" value="<?php echo $_GET['ticket'] ?>" />
        <input type="submit" value="Envoyer" />
	</p>
    </form>

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

// Récupération des derniers messages
$reponse = $bdd->query('SELECT adresseMail, texte, numTicket FROM message ORDER BY messageNB ASC');
//$reponse = $bdd->query('SELECT * FROM messgae');
//$ticket = $bdd->query('SELECT mailUser FROM ticket ORDER BY numTicket ASC');



// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch()){
    if ($donnees['numTicket'] == $_GET["ticket"])
{
	echo '<p><strong>' . $donnees['adresseMail'] . '</strong> : ' . $donnees['texte'] . '</p>';
}
}
$reponse->closeCursor();

?>
    </body>
</html>