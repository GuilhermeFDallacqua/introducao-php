<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\SobreviMarte;

$astronauta = new SobreviMarte('Roger', 100, 100);

$astronauta->explorar();
$astronauta->explorar();
$astronauta->explorar();
$astronauta->descansar(10);
$astronauta->utilizarCilindro(1);
$astronauta->explorar();
$astronauta->descansar(100);
$astronauta->utilizarCilindro(5);
echo $astronauta->status();


?>