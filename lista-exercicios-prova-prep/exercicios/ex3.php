<?php

require_once '../vendor/autoload.php';

use App\IngressoCinema;

$ingresso1 = new IngressoCinema("Homem aranha", 50, true);
$ingresso2 = new IngressoCinema("Homem aranha", 60, false);

echo "-----------Meia-----------" . PHP_EOL;
echo  $ingresso1->resumo() . PHP_EOL;


echo "-----------inteira--------" . PHP_EOL;
echo $ingresso2->resumo() . PHP_EOL;



?>