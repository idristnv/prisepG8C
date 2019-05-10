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

    <h2>Less tickets existants</h2>
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
    ?>
    <div class="divTicketex">
        <a href="savAdminMsg.php?ticket=<?php echo $donnTick['numTicket'] ?>" >Ticket numero <?php echo $donnTick['numTicket'] ?> de <?php echo $donnTick['mailUser'] ?></a>
        <!-- echo '<p>' . $donntick['numTicket']. '</p>';  METHOD GET-->



    </div>
    <?php
}
$listTicket->closeCursor();
?>
    <!-- </div> -->
</body>
</html>