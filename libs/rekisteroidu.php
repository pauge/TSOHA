<?php 
  require_once 'common.php';
  require_once 'models/kayttaja.php';
  include '../sql/dbyhteys.php';
  


  if(empty($_POST["ID"])) {
      naytaNakyma(login.php, array('error' => "Antamasi käyttäjätunnus on tyhjä.",));
  }
  if(empty($_POST["passwd"])) {
      naytaNakyma(login.php, array('error' => "Antamasi salasana on tyhjä.",));
  }
  if(empty($_POST["passwd2"])) {
      naytaNakyma(login.php, array('error' => "Antamasi salasana on tyhjä.",));
  }
  if($_POST["passwd"] != $_POST["passwd2"]) {
      naytaNakyma(login.php, array('error' => "Salasanat eivät täsmänneet.",));
  }
  $tunnus = $_POST["ID"];
  $pwd = $_POST["passwd"];
  
  $yht = new PDO("pgsql: dbname=askivilu");
  $lause = "select * from kayttaja WHERE ktunnus = '$tunnus'";
  
  $kysely = $yht->prepare($lause);
  $kysely->execute();
  $num = $kysely->rowCount();

  if($num > 0) {
      echo "Tunnus on jo olemassa";
  }
  else {
      $lause = "INSERT into kayttaja VALUES (?,?,false);";
      $kysely = $yht->prepare($lause);
      $kysely->execute(array("$tunnus","$pwd"));
      //header("Location: ../index.php");
      var_dump($kysely);//echo $num;
  }
  ?>