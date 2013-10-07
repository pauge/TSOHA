<?php 

    require_once 'common.php';

    if(empty($_POST["nimi"])) {
      $sivu = 'kirj.php';
      $err = "Antamasi käyttäjätunnus on tyhjä.";
      naytaNakymaVirhe($sivu, $err);
    }
  
    if(empty($_POST["ohje"])) {
      $sivu = '../views/kirjautuminen.php';
      $err = "Antamasi salasana on tyhjä.";
      naytaNakymaVirhe($sivu, $err);
  }
    



?>
