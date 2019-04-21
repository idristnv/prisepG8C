<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/pageAddHome.css" />

        <title>Ajouter une maison</title>
    </head>
    <body>
        <br/> <br/> <br/>
        <div class="AjouterMaison">
            <h1> Ajouter votre domicile</h1>
            <label> Nom  :</label>

            <input type="text" name="NomMaison" required
            minlength="1" maxlength="200" size="40" placeholder="Ecrivez ici le nom de votre maison">

        <br/> <br/> <br/>

            <label> Adresse :</label>

            <input type="text" name="Adresse" required
            minlength="15" maxlength="200" size="75" placeholder="Saisissez l'adresse de votre domicile">
        <br/> <br/> <br/>

        <label> Ville :</label>

            <input type="text" name="Ville" required
            minlength="3" maxlength="20" size="25" placeholder="Entrez le nom de la Ville">

        <br/> <br/> <br/>

        <label> Code Postal :</label>

            <input type="text" name="CodePostal" required
            minlength="0" maxlength="10" size="10" placeholder="Ex : 75015">


        <br/> <br/> <br/>

            <div>
            <input type="submit" value="Envoyer" style="width:200px">
            </div>
        </div>
    </body>
</html>

