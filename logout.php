<?php
  require_once 'libs/common.php';

  if(onkoKirjautunut()==true) {
    ulosKirjaus();
    $sivu = 'views/etu.php';
    $err = "Kirjauduit ulos.";
    naytaNakymaVirhe2($sivu, $err);
  }
  else {
      $sivu = 'views/etu.php';
      $err = "Et ole kirjautunut.";
      naytaNakymaVirhe2($sivu, $err);
  }