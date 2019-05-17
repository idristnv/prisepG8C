<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pagesSAV.css">
    </head>
    <style>
    form
    {
        text-align:center;
    }
    h1 
    {
        text-align:center;
        float: center;
    }
    h2
    {
        text-align:center;
    }
    .divTicketex
    {
        display:block;
        text-align:center;
        margin:auto;
    }
    </style>
    <body>
    <?php include("navigationBar.html");?>
    <h1>
    Besoin d'aide?
    </h1>

    <p style="text-align: center; font-size: 1.5vw">
    Un problème? Une question ? Nos administrateurs peuvent vous aider. 
    <br><br>
    Il vous suffit de créer un ticket et expliquer votre problème et un administrateur Prisep sera là pour résoudre le problème.  
    </p>


    <h2>Nouveau tickets</h2>
    <form action="newticket_post.php" method="post">
        <p>
        <!-- <label for="pseudo">Pseudo</label> : <input type="text" name="adresseMail" id="pseudo" /><br /> -->
        <!-- <label for="message">Message</label> :  <input type="text" name="texte" id="message" /><br /> -->

        <input type="submit" name="bouton ticket" style="font-size:1.5vw; border-radius: 3vw; padding: 0.5vw 1vw; border: 0.15vw solid #3E4866;" value="Creer un ticket"/>
    
	</p>
    </form>

    <h2>Vos tickets existants</h2>
    <!-- <div style="background-color:grey"> -->
 
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
    if ($donnTick['mailUser'] == 'valentinnajean@isep.fr'){
    ?>
    <div class="divTicketex">
        <a href="minichat.php?ticket=<?php echo $donnTick['numTicket'] ?>" >Ticket numero <?php echo $donnTick['numTicket'] ?></a>
        <!-- echo '<p>' . $donntick['numTicket']. '</p>';  METHOD GET-->



    </div>
    <?php
    }
}
$listTicket->closeCursor();
?>
    <!-- </div> -->
</body>

<?php include("Footer.html");?>
</html>


