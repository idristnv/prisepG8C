<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pageAddHome.css" />
        <title>Ajouter une résidence</title>
    </head>
    <body>
        <?php include("navigationBar.html"); ?>


        

        <div class="AjouterMaison">
            <h1> Ajouter votre domicile</h1>
            <form action="validation/pageAddHome_validation.php" method="post">

            <label> Nom  :</label>
            <input type="text" name="NomMaison" required
            minlength="1" maxlength="200" size="50" placeholder="Ecrivez ici le nom de votre maison">

            <br/> <br/> <br/>

                <label> Adresse :</label>
                <input type="text" name="Adresse" required
                minlength="4" maxlength="200" size="50" placeholder="Saisissez l'adresse de votre domicile">

            <br/> <br/> <br/>

            <label> Ville :</label>
            <input type="text" name="Ville" required minlength="3" maxlength="20" size="50" placeholder="Entrez le nom de la Ville">

            <br/> <br/> <br/>

            <label> Code Postal :</label>
            <input type="number" name="CodePostal" required minlength="5" maxlength="5" size="10" placeholder="Ex : 75015">

            <br/> <br/> <br/>

            <label> Nom de la pièce :</label>
            <input type="text" name="roomNameInput" required maxlength="20" size="50" placeholder="Nom de la pièce où sera la multiprise">



            <br/> <br/> <br/>
                <input style="font-size:1.2vw; border-radius: 3vw; padding: 0.5vw 1vw; border: 0.15vw solid #3E4866; margin-left: 42%;" type="submit" value="Envoyer" />
            </form>

            

        </div>

        
    </body>
    <?php include("Footer.html"); ?>
</html>

