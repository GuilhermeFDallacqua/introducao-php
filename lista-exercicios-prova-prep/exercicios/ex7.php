<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\Semaforo;

$semaforo1 = new Semaforo('Avenida');

for ($i = 0; $i <= 7; $i++) {
    $semaforo1->avancar();
}

echo $semaforo1->estado();


?>