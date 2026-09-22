<?php

require_once '../vendor/autoload.php';

use App\CronometroTreino;

$tempo = new CronometroTreino("Correr", 0);

$tempo->adicionarTempo(100);
$tempo->adicionarTempo(9);
$tempo->adicionarTempo(67);
echo "-----------Antes de zerar-----------" . PHP_EOL;
echo $tempo->formatarTempo() . PHP_EOL;

$tempo->zerar();
echo "-----------Depois de zerar----------" . PHP_EOL;
echo $tempo->formatarTempo();


?>