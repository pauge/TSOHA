<?php


class Kayttaja {

  /* Luokkamuuttujat */
  private $id;
  private $ktunnus;
  private $salasana;
  
  /* Konstruktori */
  function __construct($tunnus, $pwd) {
    $this->ktunnus = $tunnus;
    $this->salasana = $pwd;
  }
  public static function getKayttaja($kayttaja, $sala) {
      $acceptid = "admin";
      $acceptpwd = "kala";
      
      if($kayttaja==$acceptid && $sala == $acceptpwd) {
          return new Kayttaja($kayttaja,$sala);
          }
          
      return null;
  }
}