<?php
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
        if($_SESSION['kayttaja'] != NULL) {
            return TRUE;
            die();
        }
        else
            return FALSE;
        header('Location:kirj.php');
        die();
    };
    function ulosKirjaus() {
        unset($_SESSION['kayttaja']);
    };