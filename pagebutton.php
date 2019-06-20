<?php
session_start(); 
try{
  $bddAPP = new PDO('mysql:host=localhost;dbname=APP;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch (Exception $e){
  die('error:'.$e->getMessage());
}

function envoieTrame(String $trame){
  $ch = curl_init();
  $name = 'projets-tomcat.isep.fr';//nom du site
  $numeroPort = ':8080';//numero de port du serveur
  $dossier = "appService";
  $nomEquipe = "008C";
  $parametre = "ACTION=COMMAND&TEAM=".$nomEquipe."&TRAME=".$trame;
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,'http://'.$name.$numeroPort.'/'.$dossier.'/?'.$parametre);
  $content = curl_exec($ch);
  echo $content;
}

envoieTrame("1008C16010111");

//envoieTrame("1008C150101110LED0000000000000000");

//envoieTrame("1008C1501011100005620190619145914");



$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=008C');//attention" e/?A" pas "e?A" 
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data,33);
$size=count($data_tab);
$debutBoucle = $size-3;

for($i=$debutBoucle; $i<$size; $i++){
  $trame = $data_tab[$i];
  $nomCapteur = substr($trame,14,3);
  if($nomCapteur=="LUM"){
    $valCapteur = substr($trame,12,1);
    if ($valCapteur=="A") {
      $reqMAJ = $bddAPP->query('UPDATE multiprise SET capteurLuminosite=1 WHERE idMultiprise='.$_GET['idMultiprise']);
    }else{
      $reqMAJ = $bddAPP->query('UPDATE multiprise SET capteurLuminosite=0 WHERE idMultiprise='.$_GET['idMultiprise']);
    }

    $reqMAJ->closeCursor();
  }elseif($nomCapteur=="TMP"){
    $valCapteur = substr($trame,11,2);
    $temperature = hexdec($valCapteur);
    $reqMAJ = $bddAPP->query('UPDATE multiprise SET capteurTemperature='.$temperature.' WHERE idMultiprise='.$_GET['idMultiprise']);
    $reqMAJ->closeCursor();
  }
}


$requeteSQL = $bddAPP->query('SELECT * FROM multiprise WHERE idMultiprise='.$_GET["idMultiprise"]);
$donnee = $requeteSQL->fetch();

$buttonNb=$_GET["button"]{strlen($_GET["button"])-1};

if($_GET["button"]=="turnOff"){
  if($donnee['state']){
    $req = $bddAPP->query('UPDATE multiprise
    SET plug1State=0, plug2State=0, plug3State=0, state=0
    WHERE idMultiprise='.$_GET['idMultiprise']);
    envoieTrame("1008C16010000");
  }else{
    $req = $bddAPP->query('UPDATE multiprise
    SET plug1State=1, plug2State=1, plug3State=1, state=1
    WHERE idMultiprise='.$_GET["idMultiprise"]);
    envoieTrame("1008C16010111");
  }

}else if($buttonNb==1 || $buttonNb==2 || $buttonNb==3){
  if($donnee['plug'.$buttonNb.'State']){
    $req = $bddAPP->query('UPDATE multiprise
      SET plug'.$buttonNb.'State=0 WHERE idMultiprise='.$_GET["idMultiprise"]);
      if($buttonNb==1){
        envoieTrame("1008C16010022");
      }elseif($buttonNb==2){
        envoieTrame("1008C16010202");
      }else{
        envoieTrame("1008C16010220");
      };
  }else{
    $req = $bddAPP->query('UPDATE multiprise
      SET plug'.$buttonNb.'State=1 , state=1 WHERE idMultiprise='.$_GET["idMultiprise"]);
      if($buttonNb==1){
        envoieTrame("1008C16010122");
      }elseif($buttonNb==2){
        envoieTrame("1008C16010212");
      }else{
        envoieTrame("1008C16010221");
      };
  }

}else if($_GET["button"]=="alert"){
  if($donnee['alertNotification']){
    $req = $bddAPP->query('UPDATE multiprise
      SET alertNotification=0 WHERE idMultiprise='.$_GET["idMultiprise"]);
  }else{
    $req = $bddAPP->query('UPDATE multiprise
      SET alertNotification=1 WHERE idMultiprise='.$_GET["idMultiprise"]);
  }
}

$req->closeCursor();

$requeteSQL->closeCursor();

header('Location: pageMultiprise.php?idResidence='.$_SESSION["idResidence"].'&idPiece='.$_SESSION["idPiece"].'');
