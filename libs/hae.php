<?php 
    require_once 'common.php';
    if(empty($_POST["hakusana"])) {
        $sivu = '../views/haku.php';
        $err = "Täytä hakukenttä.";
        naytaNakymaVirhe($sivu, $err);
    }
    if($_POST["haku"] == "aines") {
        $haku = $_POST["hakusana"];
        
        $lause = "SELECT * FROM ainesosa WHERE aines = ?";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute(array($haku));
        $num =$kysely->rowCount();                          //montako reseptia sisaltaa aineen
        $arr = array();
        $i = 0;
        
        /*Reseptien ID:t ylos*/
        while ($rivi = $kysely->fetch(PDO::FETCH_OBJ)){
            $arr[$i] = $rivi->resepti;
            $i++;
        }
        $sivu ="../views/hakutulos.php";
        naytaNakymaHaku($sivu,$arr,$num,$haku);
    }
    if($_POST["haku"] == "nimi") {
        $haku = $_POST["hakusana"];
        
        $lause = "SELECT * FROM resepti WHERE nimi = ?";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute(array($haku));
        $num =$kysely->rowCount();                          //montako reseptia sisaltaa aineen

        if($num==0){
            $sivu ="haku.php";
            $a = "Ei löytynyt.";
            naytaNakymaVirhe($sivu, $a);
        }
        else {
        $tulos = $kysely->fetch(PDO::FETCH_OBJ);
        $id = $tulos->id;
        $sivu ="../views/hakutulosres.php";
        naytaNakymaHaku2($sivu, $id);
        }
    }
?>
