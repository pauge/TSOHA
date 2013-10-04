<?php 
class dbYhteys {
    public static $yhteys;
    
    function __construct() {
        self::$yhteys;
    }
    public static function getDBYhteys() {
    if(self::$yhteys == null) {
        self::$yhteys = new PDO("pgsql:dbname=askivilu");
        self::$yhteys=setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return self::$yhteys;
    }

    return self::$yhteys;
}

}