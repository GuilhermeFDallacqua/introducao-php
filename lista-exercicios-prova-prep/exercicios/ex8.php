<?php

require_once '../vendor/autoload.php';

use App\LampadaInteligente;

$lampada1 = new LampadaInteligente("Sala de estar");
$lampada2 = new LampadaInteligente("Cozinha");
$lampada3 = new LampadaInteligente("Quarto");

echo "-----------Lampada 1-----------" . PHP_EOL;
$lampada1->ajustarIntensidade(99);
$lampada1->desligar();
echo $lampada1->status() . PHP_EOL;

echo "-----------Lampada 2-----------" . PHP_EOL;
$lampada2->ajustarIntensidade(22);
$lampada2->desligar();
echo $lampada2->status() . PHP_EOL;

echo "-----------Lampada 3-----------" . PHP_EOL;
$lampada3->ajustarIntensidade(111);
$lampada3->desligar();
echo $lampada3->status() . PHP_EOL;

?>