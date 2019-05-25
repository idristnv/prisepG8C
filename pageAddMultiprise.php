<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pageAddMultiprise.css" />
        <title>Ajouter une multiprise</title>
    </head>
    <body>
        <?php include("navigationBar.html"); ?>
        <br><br>
        <h1>Ajoutez une multiprise</h1>
        <br>
        <br>
        <br>
        <div class="AjouterMaison">
            <form action="validation/pageAddHome_validation.php" method="post">

            <label>Numero de série :</label>
            <input type="text" name="idMultiprise" required
            minlength="8" placeholder="Saisissez le numéro de série de votre multiprise">

            <label>Nom pour la multiprise :</label>
            <input type="text" name="nomMultiprise" required minlength="3" placeholder="Entrez le nom de votre multiprise">

            <input type="submit" value="Envoyer">
            </form>
        </div>
    </body>
<br><br><br>
    <?php include("footer.html"); ?>
</html>