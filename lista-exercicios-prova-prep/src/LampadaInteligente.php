<?php

namespace App;

use InvalidArgumentException;

class LampadaInteligente
{
    public function __construct(
        public string $comodo,
        private bool $ligada = true, 
        private int $intensidade = 50
    ) {
        if ($this->intensidade < 0 || $this->intensidade > 100) {
            throw new InvalidArgumentException("Intensidade inválida, deve estar entre 0 e 100.");
        }
    }

    public function ligar(): void
    {
        $this->ligada = true;
    }

    public function desligar(): void
    {
        $this->ligada = false;
    }

    public function ajustarIntensidade(int $valor): bool 
    {
        if ($valor < 0 || $valor > 100) {
            echo "Intensidade inválida, deve estar entre 0 e 100." . PHP_EOL;
            return false;
        }

        $this->intensidade = $valor;
        return true;
    }

    public function status(): string
    {
        return "Cômodo: $this->comodo" . PHP_EOL . "Estado: " . ($this->ligada ? "Ligada" : "Desligada") . PHP_EOL . "Intensidade: $this->intensidade";
    }
}

?>
