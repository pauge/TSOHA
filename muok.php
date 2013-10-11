<?php
  require_once 'libs/common.php';

  $id = $_POST["id"];
  if(onkoKirjautunut()==true) {
    $sivu = "views/reseptimuokkaus.php";
    naytaResepti($sivu,$id);
  }
  else {
        $sivu = 'views/etu.php';
        $err = "Tämä sivu vaatii kirjautumisen.";
        naytaNakymaVirhe2($sivu, $err); 
  }
?>