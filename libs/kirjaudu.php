<?php
  session_start();
  include 'models/kayttaja.php';
  if(empty($_POST["ID"])) {
      naytaNakyma(login.php, array('error' => "Antamasi käyttäjätunnus on tyhjä.",));
  }
  if(empty($_POST["passwd"])) {
      naytaNakyma(login.php, array('error' => "Antamasi salasana on tyhjä.",));
  }
  $kayttaja = $_POST["ID"];
  $sala = $_POST["passwd"];
 
  /*if(Kayttaja::getKayttaja($kayttaja, $sala) != NULL) {
      $admin = new Kayttaja($kayttaja, $sala);
      $_SESSION['kayttaja'] = $admin;*/
      
  $yht = new PDO("pgsql: dbname=askivilu");
  $lause = "select * from kayttaja WHERE ktunnus = '$kayttaja' and salasana = '$sala'";
  
  $kysely = $yht->prepare($lause);
  $kysely->execute();
  $num = $kysely->rowCount();
  if($num==1) {
      $_SESSION['kirjautunut'] = $kayttaja;
      header('Location: ../hak.php');
      } 
  else {
      header('Location: ../rek.php');
  }
