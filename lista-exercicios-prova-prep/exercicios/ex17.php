<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\SmartLocker;

$pacote1 = new SmartLocker('1');

$pacote1->adicionarPacote('Pacote numero 1', 'abc123');

$pacote1->retirarPacote('dewdwed');
$pacote1->retirarPacote('dewdwed');
$pacote1->retirarPacote('dewdwed');

$pacote2 = new SmartLocker('2');

$pacote2->adicionarPacote('Pacote numero 2', 'abc123');

$pacote2->retirarPacote('abc123');



?>