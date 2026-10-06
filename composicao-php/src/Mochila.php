<?php

namespace App;

use InvalidArgumentException;

class Mochila
{
    public function __construct(
        private int $capacidade,
        private int $pesoOcupado = 0
    ) {
        if ($this->capacidade <= 0) {
            throw new InvalidArgumentException("Peso inválido");
        }
    }

    public function adicionarPeso(float $peso): bool
    {
        if ($peso <= 0) {
            echo "Peso inválido.";
            return false;
        }

        if (($this->pesoOcupado + $peso) > $this->capacidade) {
            echo "Muito peso, excedeu o limite de carga.";
            return false;
        }

        $this->pesoOcupado+=$peso;
        return true;
    }

    public function getPesoOcupado(): int
    {
        return $this->pesoOcupado;
    }

    public function getCapacidade(): int
    {
        return $this->capacidade;
    }
}