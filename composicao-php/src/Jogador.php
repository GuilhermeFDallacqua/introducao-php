<?php

namespace App;

class Jogador
{
    public function __construct(
        private string $nome,
        private int $vida,
        private Mochila $mochila
    ) {}

    public function status(): void
    {
        echo "Jogador: $this->nome" . PHP_EOL;
        echo "Vida: $this->vida" . PHP_EOL;
        echo "Mochila: {$this->mochila->getPesoOcupado()}kg";
        echo " / {$this->mochila->getCapacidade()}kg" . PHP_EOL;
    }
}