<?php


class Kayttaja {

  protected static $id = 1;
  public $ktunnus;
  public $salasana;
  
  function __construct($tunnus, $pwd) {
    self::$id++;
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
        die();
    }
            
    function getID() {
        return self::$id;
        die();
    }
    function upID() {
        self::$id++;
        die();
    }
            
    public static function setPWD($a){
        $this->salasana = $a;
        die();
    }
    
            
}