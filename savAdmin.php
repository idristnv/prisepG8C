<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pagesSAV.css">
    </head>
    <body>
        <?php include("navigationBarSavAdmin.html");?>
        <br> <br>
        <h1> Espace Administrateur </h1>
        <br>
        <br>
        <h2>Voici le(s) ticket(s) existant(s) : </h2>
        <br>
    <?php

    try
    {
	    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }



    $listTicket = $bdd->query('SELECT numTicket, mailUser FROM ticket ORDER BY numTicket ASC');
   
while($donnTick = $listTicket->fetch() /*and $donntick['mailUser']=='valentinnajean@isep.fr'*/){     //a remplacer par $_SESSION[addresse mail]
    ?>

    <div class="divTicket">
        
        <a href="savAdminMsg.php?ticket=<?php echo $donnTick['numTicket'] ?>" >Ticket numero <?php echo $donnTick['numTicket'] ?> de <?php echo $donnTick['mailUser'] ?></a>
        <!-- echo '<p>' . $donntick['numTicket']. '</p>';  METHOD GET-->



    </div>
    <?php
}
$listTicket->closeCursor();
?>
    <!-- </div> -->
    <br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include("Footer.html") ?>
</body>

</html>