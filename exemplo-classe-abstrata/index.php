<?php

require_once __DIR__  . '/vendor/autoload.php';

use App\Personagem;
use App\Guerreiro;
use App\Mago;

$personagem = new Personagem('Guendalf');

echo $personagem->getNome() . PHP_EOL;
echo $personagem->getEnergia() . PHP_EOL;

$guerreiro = new Guerreiro('Clovis');

echo $guerreiro->getNome() . PHP_EOL;
echo $guerreiro->getEnergia() . PHP_EOL;

echo $guerreiro->atacar() . PHP_EOL;
echo $guerreiro->getEnergia() . PHP_EOL;

for ($i = 0; $i < 10; $i++) {
    echo $guerreiro->atacar() . PHP_EOL;
}

$mago = new Mago('Voldermort');

echo $mago->getNome() . PHP_EOL;
echo $mago->getEnergia() . PHP_EOL;

echo $mago->atacar() . PHP_EOL;
echo $mago->getEnergia() . PHP_EOL;

for ($i = 0; $i < 10; $i++) {
    echo $mago->atacar() . PHP_EOL;
}