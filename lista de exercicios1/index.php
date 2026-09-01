<?php

#Guilherme Ferraresi Dallacqua, 2199285, BCC-C, disciplica: Progrmação orientada a objetos

require_once __DIR__ . '/vendor/autoload.php';

#Exercicio 1

use App\Retangulo;

$retangulo1 = new Retangulo(12, 10);
$retangulo2 = new Retangulo(4, 2);
$retangulo3 = new Retangulo(3, 3);

echo "A area é " . $retangulo1->area() . ", o perimetro é " . $retangulo1->perimetro() . ", é um quadrado? " . ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
echo "A area é " . $retangulo2->area() . ", o perimetro é " . $retangulo2->perimetro() . ", é um quadrado? " . ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
echo "A area é " . $retangulo3->area() . ", o perimetro é " . $retangulo3->perimetro() . ", é um quadrado? " . ($retangulo3->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

$retangulo1->redimensionar(5, 5);
echo "A area é " . $retangulo1->area() . ", o perimetro é " . $retangulo1->perimetro() . ", é um quadrado? " . ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

$retangulo2->redimensionar(10, -1);
echo "A area é " . $retangulo2->area() . ", o perimetro é " . $retangulo2->perimetro() . ", é um quadrado? " . ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

#Exercicio 2



?>