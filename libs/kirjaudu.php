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
 
  if(Kayttaja::getKayttaja($kayttaja, $sala) != NULL) {
      $admin = new Kayttaja($kayttaja, $sala);
      $_SESSION['kayttaja'] = $admin;
      header('Location: ../index.php');
      } 
  else {
      //kirjaVirhe(login.php, array(
      //'error' => "Käyttäjää ei löytynyt." ));
  }
