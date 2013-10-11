<?php     
    require_once 'common.php';
    
    $id = $_POST["id"];
    if(empty($_POST["uusi"])) {
      $sivu = '../views/reseptimuokkaus.php';
      $err = "Et kirjoittanut mitään.";
      naytaReseptiVirhe($sivu,$id,$err);
      die();
    }
    
    $aine = $_POST["uusi"];
    $lause = "select * from aines WHERE UPPER(aines) = UPPER(?);";
    
    $kysely = getYhteys()->prepare($lause);
    $kysely->execute(array($aine));
    $num = $kysely->rowCount();
    
    if($num==0) {
        $lause = "insert into aines values (?);";
        $kysely = getYhteys()->prepare($lause);
        $kysely->execute(array($aine));
        $sivu = '../views/reseptimuokkaus.php';
      $err = "'$aine' lisätty.";
      naytaReseptiVirhe($sivu,$id,$err);
    }
    else {
        $sivu = '../views/reseptiehdotus.php';
        $err = "'$aine' on jo lisättynä. Tarkkana.";
        naytaNakymaVirhe($sivu, $err);
    }
    ?>