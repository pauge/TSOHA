<?php 

    require_once 'common.php';

    if(empty($_POST["nimi"])) {
      $sivu = '../views/reseptiehdotus.php';
      $err = "Et antanut reseptille nimeä.";
      naytaNakymaVirhe($sivu, $err);
    }
  
    if(empty($_POST["ohje"])) {
      $sivu = '../views/reseptiehdotus.php';
      $err = "Kirjoita ohje. Edes 'sekoita'...";
      naytaNakymaVirhe($sivu, $err);
    }
      
    $nimi = $_POST["nimi"];
    $ohje = $_POST["ohje"];
    $lisahuomio = $_POST["lisaohje"];
    $lisaaja = $_SESSION['kirjautunut'];
    
    $lause = "select * from resepti WHERE UPPER(nimi) = UPPER(?)";
    $kysely = getYhteys()->prepare($lause);
    $kysely->execute(array($nimi));
    $num = $kysely->rowCount();

    if($num > 0) {
        $sivu = '../views/reseptiehdotus.php';
        $err = "Samalla nimellä on jo olemassa resepti.";
        naytaNakymaVirhe($sivu, $err);
    }
    else {
        /*Lisätään uusi resepti kantaan*/
        $lause2 = "INSERT into resepti (nimi,ohje,lisahuomio,hyvaksytty,lisaaja) VALUES (?,?,?,true,?);";
        $kysely2 = getYhteys()->prepare($lause2);
        $kysely2->execute(array($nimi,$ohje,$lisahuomio,$lisaaja));
        
        
        /*Haetaan äsken lisätyn ID, jotta saadaan määrät lisättyä välitauluun*/
        $lause3 = "select * from resepti where nimi=?";
        $kysely3 = getYhteys()->prepare($lause3);
        $kysely3->execute(array($nimi));
        $tulos3 = $kysely3->fetch(PDO::FETCH_OBJ);
        $id = $tulos3->id;

        /*Lisätään raaka-ainemäärät välitauluun*/
        $lause4 = "select * from aines";
        $kysely4 = getYhteys()->prepare($lause4);
        $kysely4->execute();
        $num = $kysely4->rowCount();         //kuinka monta ainesta taytyy kayda lapi?
        $i =1;                              //lomakkeen aines-kentat numeroitu 1->
        
        while($tulos4=$kysely4->fetch(PDO::FETCH_OBJ)){
            $ainesNimi = trim($tulos4->aines);
            
            if(empty($_POST["$ainesNimi"])){
            }
            else {
                $maara = $_POST["$ainesNimi"];
                $aines = $ainesNimi;
                $lause5 = "INSERT INTO ainesosa VALUES (?,?,?);";
                $kysely5 = getYhteys()->prepare($lause5);
                $kysely5->execute(array($id,$maara,$aines));
            }
        }
        
        $sivu = '../views/reseptiehdotus.php';
        $err = "Resepti '$nimi' lisätty.";
        naytaNakymaVirhe($sivu, $err);
 }
?>
