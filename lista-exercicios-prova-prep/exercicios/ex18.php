<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\PlanoDadosMov;

$plano1 = new PlanoDadosMov('Pré vivo', 20);
$plano2 = new PlanoDadosMov('Pré claro', 100);


$plano1->consumirSaldo(20);
$plano2->consumirSaldo(50);

$plano1->consumirSaldo(20);
$plano2->consumirSaldo(60);

$plano1->comprarPacotes(100);
$plano2->comprarPacotes(1000);

?>