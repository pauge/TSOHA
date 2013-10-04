<?php

    $yhteys;
    session_start();

    
    function naytaNakyma($sivu, $array) {
        require 'views/pohja.php';
        die();
    };
  
    function kirjaVirhe($sivu, $data = array()) {
        $data = (object)$data;
        require 'views/kirjautuminen.php';
        die();
    };

    function onkoKirjautunut() {
        if(isset($_SESSION['kayttaja'])) {
            echo $_SESSION['kayttaja'];
            die();
        }
        else
            return FALSE;
        header('Location:kirj.php');
        die();//
    };
    function ulosKirjaus() {
        unset($_SESSION['kayttaja']);
    };
    
    function getYhteys() {
        if($yhteys == null) {
        $yhteys = new PDO("pgsql:dbname=askivilu");
        $yhteys=setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $yhteys;
    };
 }