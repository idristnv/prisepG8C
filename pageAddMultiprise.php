<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pageAddMultiprise.css" />
        <title>Ajouter une multiprise</title>
    </head>
    <body>
        <?php include("navigationBar.html"); ?>
        <h1>Ajoutez votre multiprise</h1>
        <div class="AjouterMaison">
            <form action="validation/pageAddMultiprise_validation.php" method="post">
                <label>Numero de série :</label>
                <input type="text" name="idMultiprise" required
                minlength="8" placeholder="Saisissez le numéro de série de votre multiprise">

                <label>Nom pour la multiprise :</label>
                <input type="text" name="nomMultiprise" required minlength="3" placeholder="Entrez le nom de votre multiprise">

                <input type="submit" value="Envoyer">
            </form>
        </div>
    </body>

    <?php include("footer.html"); ?>
</html>