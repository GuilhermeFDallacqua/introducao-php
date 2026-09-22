<?php

require_once '../vendor/autoload.php';

use App\Retangulo;

$retangulo1 = new Retangulo(10, 2);
$retangulo2 = new Retangulo(10, 10);

echo '-----------Retangulo 1-----------' . PHP_EOL;
echo ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
echo $retangulo1->Area() . PHP_EOL;
echo $retangulo1->Perimetro() . PHP_EOL;
echo '---------------------------------' . PHP_EOL;

echo '-----------Retangulo 2-----------' . PHP_EOL;
echo ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
echo $retangulo2->Area() . PHP_EOL;
echo $retangulo2->Perimetro() . PHP_EOL;
echo '---------------------------------' . PHP_EOL;

?>