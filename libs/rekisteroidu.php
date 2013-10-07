<?php 
  require_once 'common.php';
  require_once 'models/kayttaja.php';
  include '../sql/dbyhteys.php';
  


  if(empty($_POST["ID"])) {
      if(empty($_POST["passwd"])||empty($_POST['passwd2'])) { 
        $sivu = '../views/kirjautuminen.php';
        $err = "Täytä kaikki kentät.";
        naytaNakymaVirhe($sivu, $err);
        die();
      }
        $sivu = '../views/rekisteroituminen.php';
        $err = "Valitse käyttäjätunnus.";
        naytaNakymaVirhe($sivu, $err);
  	die();
  }
  if(empty($_POST["passwd"])) {
      $sivu = '../views/rekisteroituminen.php';
        $err = "Täytä kaikki kentät.";
        naytaNakymaVirhe($sivu, $err);
  	die();
  }
  if(empty($_POST["passwd2"])) {
      $sivu = '../views/rekisteroituminen.php';
        $err = "Täytä kaikki kentät.";
        naytaNakymaVirhe($sivu, $err);
  	die();
  }
  if($_POST["passwd"] != $_POST["passwd2"]) {
      $sivu = '../views/rekisteroituminen.php';
        $err = "Salasanat eivät täsmää.";
        naytaNakymaVirhe($sivu, $err);
  	die();
  }
  $tunnus = $_POST["ID"];
  $pwd = $_POST["passwd"];
  
  $yht = new PDO("pgsql: dbname=askivilu");
  $lause = "select * from kayttaja WHERE ktunnus = '$tunnus'";
  
  $kysely = $yht->prepare($lause);
  $kysely->execute();
  $num = $kysely->rowCount();

  if($num > 0) {
      $sivu = '../views/rekisteroituminen.php';
        $err = "Käyttäjätunnus on jo olemassa.";
        naytaNakymaVirhe($sivu, $err);
  }
  else {
      $lause = "INSERT into kayttaja VALUES (?,?,false);";
      $kysely = $yht->prepare($lause);
      $kysely->execute(array("$tunnus","$pwd"));
      $_SESSION['kirjautunut'] = $tunnus;
      header("Location: ../index.php");
  }
  ?>
