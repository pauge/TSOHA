<?php
    
    function getDBYhteys() {
    
        static $yhteys = null;
        
        if($yhteys == null) {
            $yhteys = new PDO("pgsql:dbname=askivilu");
            $yhteys=setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $yhteys;
    }
 }




