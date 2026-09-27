<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\BateriaDispositivo;

$dispositivo = new BateriaDispositivo('System76 darter pro', 55);

$dispositivo->usar(5);
$dispositivo->usar(25);
$dispositivo->usar(30);

$dispositivo->carregar(100);

echo $dispositivo->status();

?>