<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pageAddMultiprise.css" />
        <title>Ajouter une multiprise</title>
    </head>
    <body>
        <?php include("navigationBar.html"); ?>


        <br/> <br/> <br/>

        <div class="AjouterMaison">
            <h1> Ajouter votre multiprise</h1>
            <form action="validation/pageAddHome_validation.php" method="post">

            <label> Nom  :</label>
            <input type="text" name="NomMaison" required
            minlength="1" maxlength="200" size="40" placeholder="Ecrivez ici le nom de votre maison">

            <br/> <br/> <br/>

            <label> Nom de la pièce :</label>
            <input type="text" name="roomNameInput" required maxlength="20" size="30" placeholder="Nom de la pièce où sera la multiprise">



            <br/> <br/> <br/>

                <label> Numero de série :</label>
                <input type="text" name="NumeroDeSerie" required
                minlength="4" maxlength="200" size="75" placeholder="Saisissez le numéro de série de votre multiprise">

            <br/> <br/> <br/>

            <label> Nom de la multiprise :</label>
            <input type="text" name="NomMultiprise" required minlength="3" maxlength="20" size="25" placeholder="Entrez le nom de votre multiprise">

            <br/> <br/> <br/>

                <input type="submit" value="Envoyer" style="width:200px">
            </form>

            

        </div>

        
    </body>
    <?php include("Footer.html"); ?>
</html>