<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\DroneInspecao;

$drone = new DroneInspecao('A120', 10);

$drone->decolar();

$drone->recarregar(100);
$drone->decolar();
$drone->voar(10);

$drone->recarregar(200);
$drone->pousar();

echo $drone->status();


?>