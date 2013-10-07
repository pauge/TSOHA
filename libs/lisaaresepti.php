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
    
    $yht = new PDO("pgsql: dbname=askivilu");
    $lause = "select * from kayttaja WHERE nimi = '$nimi'";
  
    $kysely = $yht->prepare($lause);
    $kysely->execute();
    $num = $kysely->rowCount();

    if($num > 0) {
        $sivu = '../views/reseptiehdotus.php';
        $err = "Samalla nimellä on jo olemassa resepti.";
        naytaNakymaVirhe($sivu, $err);
    }
    else {
        $lause = "INSERT into resepti (nimi,ohje,lisahuomio,hyvaksytty,lisaaja) VALUES (?,?,?,true,?);";
        $kysely = $yht->prepare($lause);
        $kysely->execute(array($nimi,$ohje,$lisahuomio,$lisaaja));
        $sivu = '../views/reseptiehdotus.php';
        $err = "Resepti '$nimi' lisätty.";
        naytaNakymaVirhe($sivu, $err);
 }
    



?>
