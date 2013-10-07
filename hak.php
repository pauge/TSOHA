<?php
  require_once 'libs/common.php';

  if(onkoKirjautunut()==true) {
    $sivu = 'views/haku.php';
    naytaNakyma($sivu);}
  else {
      $sivu = 'views/etu.php';
      $err = "Tämä sivu vaatii kirjautumisen.";
      naytaNakymaVirhe2($sivu, $err);
  }