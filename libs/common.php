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
    
    function naytaNakymaHaku($sivu, $arr,$num, $haku) {
        require '../views/pohja.php';
    };
    
    function naytaNakymaHaku2($sivu, $id) {
        require '../views/pohja.php';
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
        static $yhteys = NULL;
        if($yhteys == NULL) {
        $yhteys = new PDO("pgsql:dbname=askivilu");
        }
        return $yhteys;
    }
 
    function tulostaAineet() {
        
        $lause = "select * from aines;";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute();

        $i = 1;
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $nimi = "$tulos->aines";
            echo "<input type='text' height='7' maxlength='4' size='1' name='"; echo trim($nimi); echo "'>cl  $tulos->aines&nbsp;&nbsp;&nbsp;";
            if($i%3==0) {           //jakaa aineita vierekkäin/allekkain
                echo "<br>";
            }
            $i++;
        }
    }
    
    function tulostaAineetMuokattavaksi($id) {
        
        $lause = "select * from aines;";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute();
        
        $lause2 = "select * from ainesosa where resepti = ?;";  //haetaan ainesosat jotka kuuluvat tälle reseptille
        $kysely2 = getYhteys()->prepare($lause2);
        $kysely2->execute(array($id));
        $tulos2 = $kysely2->fetch(PDO::FETCH_OBJ);

        $i = 1;
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $nimiAinesosa = trim($tulos2->aines);         //aineen nimi vanhassa reseptissä
            $nimiKentta = trim($tulos->aines);            //kentän nimi, jota tällä hetkellä ollaan täyttämässä
            $maara = NULL;
            if($nimiAinesosa == $nimiKentta) {
                $maara = $tulos2->maara;
                $tulos2 = $kysely2->fetch(PDO::FETCH_OBJ);
            }
            echo "<input type='text' height='7' maxlength='4' size='1' value ='$maara'name='"; echo trim($nimiKentta); echo "'>cl  $tulos->aines&nbsp;&nbsp;&nbsp;";
            if($i%3==0) {
                echo "<br>";
            }
            $i++;
        }
    }
    
    function listaaKaikki() {
        $lause = "select * from resepti;";
        $kysely = getYhteys()->prepare($lause);
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
    
    function listaaKaikkiID($array,$num) {
        
        $i = 0;
        while($i<$num){
            $lause = "select * from resepti where id = ?";
            $kysely = getYhteys()->prepare($lause);
            $kysely->execute(array($array[$i]));

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
            $i++;
        }
    }
    
    function listaaResepti($id) {
        $lause = "select * from resepti where id = ?;";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute(array($id));
        
        while ($tulos = $kysely->fetch(PDO::FETCH_OBJ)) {
            $nimi = $tulos->nimi;
            $ohje = $tulos->ohje;
            $lisa = $tulos->lisahuomio;
            $lisaaja = $tulos->lisaaja;
            echo "<p><b>Nimi: </b>$nimi";
            echo "<br>";
            echo "<p><b>Ohje: </b>$ohje";
            echo "<br>";
            echo "<p><b>Lisähuomautukset: </b>$lisa";
            echo "</p><br>";
        }
        $lause2 = "select * from ainesosa where resepti = '$id';";
        $kysely2 = getYhteys()->prepare($lause2);
        $kysely2->execute();
        echo "<p><b>Tarvittavat aineet: </b></p>";
        while($tulos2 = $kysely2->fetch(PDO::FETCH_OBJ)){
            $maara = $tulos2->maara;
            $aines = $tulos2->aines;
            echo "<br>";
            echo "$maara";
            echo "cl -- $aines"; 
    }
    

        if(trim($lisaaja) == trim($_SESSION['kirjautunut'])) {
            echo '<br><br>';
            echo '<form action="../muok.php" method="post">
                    <p><input type="submit" value="Muokkaa reseptiä"></p>
                    <input type="hidden" name="id" value="';echo $id;echo '">
                  </form>';
            echo '<form action="../poista.php" method="post">
                    <p><input type="submit" value="Poista resepti"></p>
                    <input type="hidden" name="id" value="';echo $id;echo '">
                  </form>';
        }
        
    }
    function naytaResepti($sivu,$id) {
        require 'views/pohja.php';
        die();
    }
    
    function naytaReseptiVirhe($sivu,$id, $err) {
        $viesti['virhe'] = $err;
        require '../views/pohja.php';
        die();
    }
    
    function poistaResepti($id) {
        $lause = "delete from ainesosa where resepti = ?;";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute(array($id));
        
        $lause2 = "delete from resepti where id = ?;";
        $kysely = getYhteys()->prepare($lause2);
        $kysely->execute(array($id));
    }
    
    function muokkaaReseptia($id) {

                
        $lause = "SELECT * FROM resepti WHERE id = ?;";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute(array($id));
        $rivi = $kysely->fetch(PDO::FETCH_OBJ);

        $lause2 = "SELECT * FROM ainesosa WHERE resepti = ?;";
        $kysely2 = getYhteys()->prepare($lause2);
        $kysely2->execute(array($id));
        
        echo '<p>Jos et löydä tarvittavaa aineosaa listalta, lisää se tässä:</p>
            <form action="../libs/lisaaAineMuok.php" method="post">
                <p><input type="text" name="uusi" maxlength="20"><input type="submit"></p>
                <input type="hidden" name="id" value="'; echo $id; echo '">
            </form>
            <br>
            <form action="../libs/paivitaresepti.php" method="post">
                <div>
                    <p>Reseptin nimi:</p>
                    <p><input type="text" name="nimi" maxlength="30" size="30" value="'; echo trim($rivi->nimi); echo '"></p><br><p> Aineet tällä hetkellä';
                    while($tulos2 = $kysely2->fetch(PDO::FETCH_OBJ)){
                          $maara = $tulos2->maara;
                          $aines = $tulos2->aines;
                          echo "<br>";
                          echo "$maara";
                          echo "cl -- $aines"; 
                    };
                    echo '<p>'; tulostaAineetMuokattavaksi($id); echo '<p>Määrä ja aines</p></p><br>
                </div>
                <p>Ohjeet</p>
                    <textarea rows="3" cols="50" name="ohje">'; echo trim($rivi->ohje); echo '</textarea>
                <p>Lisähuomautukset</p>
                    <textarea rows="3" cols="50" name="lisaohje">'; echo trim($rivi->lisahuomio); echo '</textarea>
                <p><input type="submit"></p>
                <input type="hidden" name="id" value="'; echo $id; echo '">
            </form>';
    }