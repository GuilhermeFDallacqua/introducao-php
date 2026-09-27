<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\MaquinaSnack;

$maquina = new MaquinaSnack('Doritos', 15);

echo "-----------Saldo insuficiente-----------" . PHP_EOL;
$maquina->comprar();

echo "-----------Sem estoque-----------" . PHP_EOL;
$maquina->inserirCredito(100);
$maquina->comprar();

echo "-----------Compra bem-sucedida-----------" . PHP_EOL;
$maquina->reabastecer(10);
$maquina->comprar();

echo "-----------Compra com créditos excedentes-----------" . PHP_EOL;
$maquina->comprar();

echo "-----------Devolução-----------" . PHP_EOL;
$maquina->devolverCredito();

?>