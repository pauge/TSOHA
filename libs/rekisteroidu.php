<?php 
  include 'models/kayttaja.php';
  include '../sql/dbyhteys.php';
  
  if(empty($_POST["ID"])) {
      naytaNakyma(login.php, array('error' => "Antamasi käyttäjätunnus on tyhjä.",));
  }
  if(empty($_POST["passwd"])) {
      naytaNakyma(login.php, array('error' => "Antamasi salasana on tyhjä.",));
  }
  if(empty($_POST["passwd2"])) {
      naytaNakyma(login.php, array('error' => "Antamasi salasana on tyhjä.",));
  }
  if($_POST["passwd"] != $_POST["passwd2"]) {
      naytaNakyma(login.php, array('error' => "Salasanat eivät täsmänneet.",));
  }
  $tunnus = $_POST["ID"];
  $pwd = $_POST["passwd"];
  
  $yht = dbYhteys::getDBYhteys();
  //$lause = "select * from kayttaja;";
  $lause = "delete from kayttaja where id=2;";
  
  //$kysely = $yht->prepare($lause);
  //$tulos = $kysely->execute();
  //$rivi = $tulos->fetchObject();
  
  
  var_dump($yht);
  /*if($tulos > 0) {
      echo "Tunnus on jo olemassa";
  }
  
  else {
      $lause = "INSERT into kayttaja VALUES (?,?";
      $kysely = $yhteys->prepare($lause);
      $tulos = $yhteys->exec(array($tunnus,$pwd));
  }*/
     
 