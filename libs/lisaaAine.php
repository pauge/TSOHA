<?php     
    require_once 'common.php';
    if(empty($_POST["uusi"])) {
      $sivu = 'kirj.php';
      $err = "Et kirjoittanut mitään.";
      naytaNakymaVirhe($sivu, $err);
    }
    
    $aine = $_POST["uusi"];
    $yht = new PDO("pgsql: dbname=askivilu");
    $lause = "select * from aines WHERE aines = '$aine'";
    
    $kysely = $yht->prepare($lause);
    $kysely->execute();
    $num = $kysely->rowCount();
    
    if($num==0) {
        $lause = "insert into aines values (?);";
        $kysely = $yht->prepare($lause);
        $kysely->execute(array($aine));
        header("Location: ../res.php");
    }
    else {
        echo "Täällä '$num'";
    }
    ?>
