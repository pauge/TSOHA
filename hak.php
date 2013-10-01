<?php
  require_once 'libs/common.php';

  if(onkoKirjautunut()==true) {
    $sivu = 'views/haku.php';
    naytaNakyma($sivu);}
  else
      header ('Location:index.php');
  