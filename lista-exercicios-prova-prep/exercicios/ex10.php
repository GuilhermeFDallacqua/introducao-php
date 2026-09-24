<?php

require_once '../vendor/autoload.php';

use App\CofrinhoMeta;

$meta1 = new CofrinhoMeta('Comprar um carro', 100, 100000);

$meta1->depositar(10000);
$meta1->retirar(1000);
$meta1->depositar(2000000);
$meta1->retirar(10000000000);

echo $meta1->resumo();

?>