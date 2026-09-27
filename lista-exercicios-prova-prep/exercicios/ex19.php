<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\RoboArena;

$robo1 = new RoboArena('Claudio', 100);
$robo2 = new RoboArena('Roberto', 50);

echo "-----------Robo 1-----------" . PHP_EOL;
$robo1->treinar();
$robo1->treinar();
$robo1->treinar();
$robo1->recarregar(20);
$robo1->combate();
$robo1->recarregar(100);
$robo1->restaurarIntegridade(100);
echo $robo1->status() . PHP_EOL;

echo "-----------Robo 2-----------" . PHP_EOL;
$robo2->treinar();
$robo2->treinar();
$robo2->recarregar(20);
$robo2->treinar();
$robo2->recarregar(50);
$robo2->combate();
$robo2->recarregar(100);
$robo2->restaurarIntegridade(100);
echo $robo2->status();

?>