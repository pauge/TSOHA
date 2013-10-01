<?php


class Kayttaja {

  private $id;
  private $ktunnus;
  private $salasana;
  
  function __construct($tunnus, $pwd) {
    $this->ktunnus = $tunnus;
    $this->salasana = $pwd;
  }
  
  public static function getKayttaja($kayttaja, $sala) {
      $acceptid = "admin";
      $acceptpwd = "kala";
      
      if($kayttaja==$acceptid && $sala == $acceptpwd) {
          return new Kayttaja($kayttaja,$sala);
          header('Location:index.php');
          }
      else{
          header('Location:../kirj.php');
      }
  }
}
