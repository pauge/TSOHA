<?php


class Kayttaja {

  private $id;
  private $nimi;
  private $ohje;
  private $lisahuomio;
  private $hyvaksytty;
  private $lisaaja;


  function __construct($id, $nimi, $ohje, $lisahuomio, $hyvaksytty, $lisaaja) {
      $this->id = $id;
      $this->nimi = $nimi;
      $this->ohje = $ohje;
      $this->lisahuomio = $lisahuomio;
      $this->hyvaksytty = $hyvaksytty;
      $this->lisaaja = $lisaaja;
  }

  public static function getID() {
    return $this->id;
  }
          
  public static function getNimi() {
    return $this->nimi;  
  }
          
  public static function getOhje() {
      return $this->ohje;
  }
          
  public static function getLisahuomio() {
      return $this->lisahuomio;
  }
          
  public static function getLisaaja() {
      return $this->lisaaja;
  }
          
  public static function getHyvaksytty() {
      return $this->hyvaksytty;
  }
}
