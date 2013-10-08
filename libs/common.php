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
        $x = 1;
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $nimi = "$tulos->aines";
            echo "<input type='text' height='7' maxlength='4' size='1' name='$x'>cl  $tulos->aines&nbsp;&nbsp;&nbsp;";
            if($i%3==0) {
                echo "<br>";
            }
            $i++;
            $x++;
        }
    }
    
    function listaaKaikki() {
        $yhteys = new PDO("pgsql:dbname=askivilu");

        $lause = "select * from resepti;";
        $kysely = $yhteys->prepare($lause);
        $kysely->execute();
        
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $id = $tulos->id;
            echo "<a href=";
            echo '"http://askivilu.users.cs.helsinki.fi/list.php?id=';
            echo "$id";
            echo  '">';
            echo "$tulos->nimi";
            echo "</a>";
            echo "<br>";
        }
    }
    
    function listaaResepti($id) {
        $yhteys = new PDO("pgsql:dbname=askivilu");

        $lause = "select * from resepti where id = ?;";
        $kysely = $yhteys->prepare($lause);
        $kysely->execute(array($id));
        
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $nimi = $tulos->nimi;
            $ohje = $tulos->ohje;
            $lisa = $tulos->lisaohje;
            echo "<p><b>Nimi: </b>$nimi";
            echo "<br>";
            echo "<p><b>Ohje: </b>$ohje";
            echo "<br>";
            echo "<p><b>Lisähuomautukset: </b>$lisa";
            echo "</p><br>";
        }
        $lause2 = "select * from ainesosa where resepti = '$id';";
        $kysely2 = $yhteys->prepare($lause2);
        $kysely2->execute();
        echo "<p><b>Tarvittavat aineet: </b></p>";
        while($tulos2 = $kysely2->fetch(PDO::FETCH_OBJ)){
            $maara = $tulos2->maara;
            $aines = $tulos2->aines;
            echo "<br>";
            echo "$maara";
            echo "cl -- $aines"; 
    }
        echo '<br><br><a href="http://askivilu.users.cs.helsinki.fi/ark.php"> Takaisin </a>';
    }
    function naytaResepti($sivu,$id) {
        require 'views/pohja.php';
        die();
    }