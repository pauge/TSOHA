<?php 

function dbYhteys() {
    static $yhteys = null;
    if(yhteys == null) {
        $yhteys = new PDO("psql:");}

return $yhteys;
};