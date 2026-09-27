<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\Hidrometro;

$hidrometro = new Hidrometro('Hidrometro 1', 100, 120);

//Leituras válidas
echo "-----------Leitura 1-----------" . PHP_EOL;
$hidrometro->registrarLeitura(120);
echo $hidrometro->resumo() . PHP_EOL;

echo "-----------Leitura 2-----------" . PHP_EOL;
$hidrometro->registrarLeitura(130);
echo $hidrometro->resumo() . PHP_EOL;

echo "-----------Leitura 3-----------" . PHP_EOL;
$hidrometro->registrarLeitura(130);
echo $hidrometro->resumo() . PHP_EOL;

//Leitura inválida
echo "-----------Leitura Inválida-----------" . PHP_EOL;
$hidrometro->registrarLeitura(10);
echo $hidrometro->resumo();


?>