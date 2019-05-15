<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styleSheet/GestionCyclesStyle.css" />

        <title>Gestion des cycles</title>
    </head>

    <body>
    <?php include("navigationBar.html");?>
      <br/>
      <br/>
      <br/>

    <table>
<br/>
<br/>


<tr>
<td width="20%"> <input type="checkbox" name="Lundi" > <label>Lundi </label>
<br/> <br/><input type="checkbox" name="Mardi" > <label>Mardi </label>
<br/> <br/><input type="checkbox" name="Mercredi" > <label>Mercredi </label>
<br/> <br/><input type="checkbox" name="Jeudi" > <label>Jeudi </label>
<br/> <br/><input type="checkbox" name="Vendredi" > <label>Vendredi </label>
<br/> <br/><input type="checkbox" name="Samedi" > <label>Samedi </label>
<br/> <br/><input type="checkbox" name="Dimanche" > <label>Dimanche </label>
</td>

<td width="10%"> <input type="checkbox" name="Prise 1" > <label>Prise 1 </label>
<br/> <br/><input type="checkbox" name="Prise 2" > <label>Prise 2 </label>
<br/> <br/><input type="checkbox" name="Prise 3" > <label>Prise 3 </label> </td>

        <td

width="20%"> <input type="checkbox" name="Copie cycle jour" >  <label>Copier ce cycle sur toutes les prises de la pièce </label
</br> <br/> <br/>  <input type="checkbox" name="Copie cycle semaine" > <label>Copier ce cycle sur toutes les prises du domicile</label>

<br/>
<br/>
<input type="checkbox" name="Alerte Prise" > <label>Envoyer une alerte si la prise depasse le temps limite </label>
<label for="SaisiTemps ">:</label>

<input type="text" id="SaisiTemps" name="SaisiTemps" required
       minlength="1" maxlength="5" size="13" placeholder=" Heures : Minutes">
     </td>


<td width="5%"> DEBUT </td>
<td width="20%"></td>
<td width="5%">  FIN </td>
<td width="20%"></td>

</tr>
</table>
</body>
<br>
<br>
<br>
<br>
<?php include("Footer.html") ?>
</html>
