<?php 

class Aines {
    
    private $aines;
    
    function __construct($a) {
        $this->$aines = $a;
    }
    
    
    public static function setAines($a) {
        $this->aines = $a;
    }
    

    public static function getAines() {
        return $this->aines;
    }
}