<?php
  session_start();
  require_once 'common.php';
  include 'models/kayttaja.php';
 
  /*Onko kentät täytetty?*/
  if(empty($_POST["ID"])) {
      if(empty($_POST["passwd"])) { 
        $sivu = '../views/kirjautuminen.php';
        $err = "Täydennä kentät.";
        naytaNakymaVirhe($sivu, $err);
        die();
      }
      $sivu = '../views/kirjautuminen.php';
      $err = "Antamasi käyttäjätunnus on tyhjä.";
      naytaNakymaVirhe($sivu, $err);
  }
  
  if(empty($_POST["passwd"])) {
      $sivu = '../views/kirjautuminen.php';
      $err = "Antamasi salasana on tyhjä.";
      naytaNakymaVirhe($sivu, $err);
  }
  
  if(isset($_SESSION['kirjautunut'])) {
      $sivu = '../views/kirjautuminen.php';
      $err = "Kirjaa edellinen ulos ensin.";
      naytaNakymaVirhe($sivu, $err);
      die();
  }
  
 
  $kayttaja = $_POST["ID"];
  $sala = $_POST["passwd"];
      
  $lause = "select * from kayttaja WHERE ktunnus = '$kayttaja' and salasana = '$sala'";
  
  $kysely = getYhteys()->prepare($lause);
  $kysely->execute();
  $num = $kysely->rowCount();
  if($num==1) {
      $_SESSION['kirjautunut'] = $kayttaja;
      header('Location: ../hak.php');
      } 
  if($num==0 && !empty($_POST["ID"]) && !empty($_POST["passwd"])) {
      $sivu = '../views/kirjautuminen.php';
      $err = "Virhe kirjautuessa. Yritä uudelleen tai rekisteröidy.";
      naytaNakymaVirhe($sivu, $err);
  }
