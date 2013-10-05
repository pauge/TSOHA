<?php
    session_start();

    
    function naytaNakymaVirhe($sivu, $a) {
        $viesti['virhe'] = $a;
        //$sivu = $s;
        require '../views/pohja.php';
    };
    
    function naytaNakyma($sivu) {

        require 'views/pohja.php';
        
        die();
    };
  
    function kirjaVirhe($sivu, $data = array()) {
        $data = (object)$data;
        require 'views/kirjautuminen.php';
        die();
    };

    function onkoKirjautunut() {
        if($_SESSION['kirjautunut']!= null) {
            return true;
        }
        else
            return false;
    };
    function ulosKirjaus() {
        $_SESSION['kirjautunut'] = null;
    };
    
    function getYhteys() {
        if($yhteys == null) {
        $yhteys = new PDO("pgsql:dbname=askivilu");
        $yhteys=setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $yhteys;
    };
 }