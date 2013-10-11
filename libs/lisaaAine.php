<?php     
    require_once 'common.php';
    if(empty($_POST["uusi"])) {
      $sivu = 'kirj.php';
      $err = "Et kirjoittanut mitään.";
      naytaNakymaVirhe($sivu, $err);
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
        header("Location: ../res.php");
    }
    else {
        $sivu = '../views/reseptiehdotus.php';
        $err = "'$aine' on jo lisättynä. Tarkkana.";
        naytaNakymaVirhe($sivu, $err);
    }
    ?>
