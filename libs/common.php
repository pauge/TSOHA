<?php
    session_start();

    
    function naytaNakymaVirhe($sivu, $a) {
        $viesti['virhe'] = $a;
        require '../views/pohja.php';
    };
    
    /*Eri funktio tiedostopolkujen takia*/
    function naytaNakymaVirhe2($sivu, $a) {
        $viesti['virhe'] = $a;
        require 'views/pohja.php';
    };
    
    function naytaNakyma($sivu) {
        require 'views/pohja.php';
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
    function tulostaAineet() {
        $yhteys = new PDO("pgsql:dbname=askivilu");

        $lause = "select * from aines;";
        $kysely = $yhteys->prepare($lause);
        $kysely->execute();

        $i = 1;
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $nimi = "$tulos->aines";
            echo "<input type='text' height='7' maxlength='4' size='1' name='$nimi'>cl  $tulos->aines&nbsp;&nbsp;&nbsp;";
            if($i%3==0) {
                echo "<br>";
            }
            $i++;
        }
    }
    
    function listaaKaikki() {
        $yhteys = new PDO("pgsql:dbname=askivilu");

        $lause = "select * from resepti;";
        $kysely = $yhteys->prepare($lause);
        $kysely->execute();

        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            echo "$tulos->nimi";
            echo "<br>";
            echo "$tulos->ohje";
            echo "$<br>";
            echo "$tulos->lisahuomio";
        }
    }
    
