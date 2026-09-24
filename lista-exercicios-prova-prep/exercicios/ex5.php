<?php

require_once '../vendor/autoload.php';

use App\Triangulo;

$trianguloEq = new Triangulo(10, 10, 10);
echo "-----------Triangulo Equilátero-----------" . PHP_EOL;
echo "classificação: {$trianguloEq->classificar()}" . PHP_EOL;
echo "Perimetro: {$trianguloEq->perimetro()}" . PHP_EOL;

$trianguloEsca = new Triangulo(12, 20, 10);
echo "-----------Triangulo Escaleno-----------" . PHP_EOL;
echo "classificação: {$trianguloEsca->classificar()}" . PHP_EOL;
echo "Perimetro: {$trianguloEsca->perimetro()}" . PHP_EOL;

$trianguloInva = new Triangulo(5, 5, 40);
echo "-----------Triangulo inválido-----------" . PHP_EOL;
echo "classificação: {$trianguloInva->classificar()}" . PHP_EOL;
echo "Perimetro: {$trianguloInva->perimetro()}";
?>