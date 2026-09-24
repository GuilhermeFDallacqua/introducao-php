<?php

require_once '../vendor/autoload.php';

use App\TicketEstacionamento;

$vaga1 = new TicketEstacionamento("aaaa-123", 480, 20);
$vaga2 = new TicketEstacionamento("bbbb-123", 480, 20);
$vaga3 = new TicketEstacionamento("dddd-123", 480, 20);


$vaga1->registrarSaida(520);
$vaga2->registrarSaida(540);
$vaga3->registrarSaida(605);

echo "-----------Vaga 1-----------" . PHP_EOL;
echo $vaga1->resumo() . PHP_EOL;

echo "-----------Vaga 2-----------" . PHP_EOL;
echo $vaga2->resumo() . PHP_EOL;

echo "-----------Vaga 3-----------" . PHP_EOL;
echo $vaga3->resumo();

?>