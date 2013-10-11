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
    
    $lause = "select * from resepti WHERE nimi = '$nimi'";
    $kysely = getYhteys()->prepare($lause);
    $kysely->execute();


    

        /*Lisätään uusi resepti kantaan*/

        $lause2 = "update resepti set nimi = ?, ohje = ?, lisahuomio = ? where id = ?;";
        $kysely2 = getYhteys()->prepare($lause2);
        $kysely2->execute(array($nimi,$ohje,$lisahuomio,$id));
        
        $lause3 = "delete from ainesosa where resepti = ?;"; // poistetaan vanhat ainesosat. niitä on hankala paivittaa...
        $kysely3 = getYhteys()->prepare($lause3);
        $kysely3->execute(array($id));
        
        $lause4 = "select * from aines";
        $kysely4 = getYhteys()->prepare($lause4);
        $kysely4->execute();
        $num = $kysely4->rowCount();         //kuinka monta ainesta taytyy kayda lapi?
        $i =1;
        
        while($i<=$num) {
            $rivi = $kysely4->fetch(PDO::FETCH_OBJ);
            if(empty($_POST["$i"])){
                $i++;
            }
            else {
                $maara = $_POST["$i"];          //paljon laitetaan
                $aines = $rivi->aines;          //mita laitetaan
                $lause5 = "INSERT INTO ainesosa VALUES (?,?,?);";
                $kysely5 = getYhteys()->prepare($lause5);
                $kysely5->execute(array($id,$maara,$aines));
                $i++; 
            }
        }

        $sivu = '../views/arkisto.php';
        $err = "Resepti '$nimi' muokattu.";
        naytaNakymaVirhe($sivu, $err);
 
?>
