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

    function getTunnus() {
        return $this->ktunnus;
    }
            
    public static function getID() {
        return $this->id;
    }
            
    public static function setPWD($a){
        $this->salasana = $a;
    }
            
}