<?php
  require_once 'libs/common.php';

  $id = $_GET["id"];
  if(onkoKirjautunut()==true) {
    $sivu = "views/listres.php";
    naytaResepti($sivu,$id);
  }
  else {
        $sivu = 'views/etu.php';
        $err = "Tämä sivu vaatii kirjautumisen.";
        naytaNakymaVirhe2($sivu, $err); 
  }
