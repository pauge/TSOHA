<?php 

    require_once 'common.php';

    $id = $_POST["id"];
    if(empty($_POST["nimi"])) {
      $sivu = '../views/reseptimuokkaus.php';
      $err = "Et antanut reseptille nimeä.";
      naytaReseptiVirhe($sivu,$id,$err);
      die();
    }
  
    if(empty($_POST["ohje"])) {
      $sivu = '../views/reseptimuokkaus.php';
      $err = "Et antanut reseptille ohjetta.";
      naytaReseptiVirhe($sivu,$id,$err);
      die();
    }
      
    $nimi = $_POST["nimi"];
    $ohje = $_POST["ohje"];
    $lisahuomio = $_POST["lisaohje"];
    $lisaaja = $_SESSION['kirjautunut'];
   

        /*Lisätään uusi resepti kantaan*/

        $lause2 = "update resepti set nimi = ?, ohje = ?, lisahuomio = ? where id = ?;";
        $kysely2 = getYhteys()->prepare($lause2);
        $kysely2->execute(array($nimi,$ohje,$lisahuomio,$id));
        
        $lause3 = "delete from ainesosa where resepti = ?;"; // poistetaan vanhat ainesosat
        $kysely3 = getYhteys()->prepare($lause3);
        $kysely3->execute(array($id));
        
        $lause4 = "select * from aines";
        $kysely4 = getYhteys()->prepare($lause4);
        $kysely4->execute();
        
        $lause5 = "select * from ainesosa where resepti = ?;";  //haetaan ainesosat jotka kuuluvat tälle reseptille
        $kysely5 = getYhteys()->prepare($lause5);
        $kysely5->execute(array($id));
        $tulos5 = $kysely5->fetch(PDO::FETCH_OBJ);
        $ainesVanha = trim($tulos5->aines);                 //otetaan ylös aineen nimi, joka on välitaulussa ensimmäisenä reseptin id:llä. 
                                                            //tauluissa rivit ovat nimen suhteen samassa järjestyksessä
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

        $sivu = '../views/arkisto.php';
        $err = "Resepti '$nimi' muokattu.";
        naytaNakymaVirhe($sivu, $err);
 
?>
