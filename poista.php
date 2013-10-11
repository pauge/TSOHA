<?php
  require_once 'libs/common.php';

  $id = $_POST['id'];
  if(onkoKirjautunut()==true) {
    $sivu = "views/arkisto.php";
    $err = "Poistettu!";
    poistaResepti($id);
    naytaNakymaVirhe2($sivu,$err);
  }
  else {
        $sivu = 'views/etu.php';
        $err = "Tämä sivu vaatii kirjautumisen.";
        naytaNakymaVirhe2($sivu, $err); 
  }
?>