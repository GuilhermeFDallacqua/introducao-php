<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\CartaoTransporte;

$cartao1 = new CartaoTransporte('Edivaldo', 0, 20);

$cartao1->recarregar(100);

for ($i = 0; $i <= 5; $i++) {
    $cartao1->embarcar();
}

echo $cartao1->resumo();

?>