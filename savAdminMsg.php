<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Chat Administrateur</title>
        <link rel="stylesheet" href="stylesheet/SAVadminMsg.css">
    </head>
    <body>
    <?php include("navigationBarTicket.html");?>
<br>
    <h1> Contact avec le client </h1>
<br>
    <form action="savAdminMsg_post.php?ticket=<?php $_GET['ticket'] ?>" method="post">
        <p>
        <!-- <label for="pseudo">Pseudo</label> : <input type="text" name="adresseMail" id="pseudo" /><br /> -->
        <label for="message" style="font-size:1.5vw;">Message </label> :  <input style="height:40px; width:80%; margin-left: 3%" type="text" name="texte" id="message" /><br />
        <input type="hidden" name="numTicketURL" value="<?php echo $_GET['ticket'] ?>" />
        <input style="font-size:1.5vw; border-radius: 3vw; padding: 0.5vw 1vw; border: 0.15vw solid #3E4866; margin-left: 2%; margin-top: 0.5vw;" type="submit" value="Envoyer" />

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
	if ($donnees['adresseMail'] == 'Administrateur Prisep'){
	    echo  '<p class="container"><strong>' . $donnees['adresseMail'] . '</strong> : ' . $donnees['texte'] . '</p>' ;
        }
    else{
            echo '<p class="test"><strong>' . $donnees['adresseMail'] . '</strong> : ' . $donnees['texte'] . '</p>';
        }
}
}
$reponse->closeCursor();

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("footer.html");?>
    </body>

</html>