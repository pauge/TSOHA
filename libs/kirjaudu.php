<?php
  session_start();
  if(empty($_POST["ID"])) {
      naytaNakyma(login.php, array('error' => "Antamasi käyttäjätunnus on tyhjä.",));
  }
  if(empty($_POST["passwd"])) {
      naytaNakyma(login.php, array('error' => "Antamasi salasana on tyhjä.",));
  }
  $kayttaja = $_POST["ID"];
  $sala = $_POST["passwd"];
  
  if(Kayttaja::getKayttaja($kayttaja, $sala) != null) {
      $admin = Kayttaja::getKayttaja($kayttaja, $sala);
      $_SESSION['logged_in'] = $admin;
      header('Location: views/haku.php');
      echo 'onnistui';
      }
      
  else {
      echo '4';
      //kirjaVirhe(login.php, array(
      //'error' => "Käyttäjää ei löytynyt." ));
  }
