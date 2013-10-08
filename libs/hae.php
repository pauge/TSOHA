<?php 
    require_once 'common.php';
    if(empty($_POST["hakusana"])) {
        $sivu = '../views/haku.php';
        $err = "Täytä hakukenttä.";
        naytaNakymaVirhe($sivu, $err);
    }
?>
