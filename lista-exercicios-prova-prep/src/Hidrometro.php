<?php

namespace App;

use InvalidArgumentException;

class Hidrometro
{
    public function __construct(
        public string $identificacao,
        private float $leituraAnterior,
        private float $leituraAtual
    ) {
        if ($this->leituraAtual <= 0) {
            throw new InvalidArgumentException("Leitura atual inválida.");
        }

        if ($this->leituraAnterior <= 0) {
            throw new InvalidArgumentException("Leitura anterior inválida.");
        }
    }

    public function registrarLeitura(float $novaLeitura): bool
    {
        if ($novaLeitura < $this->leituraAtual) {
            echo "Nova leitura inválida, o valor deve ser maior ou igual a leitura atual";
            return false;
        }

        $this->leituraAnterior = $this->leituraAtual;
        $this->leituraAtual = $novaLeitura;
        return true;
    }

    public function consumoUltimoPeriodo(): float
    {
        return $this->leituraAtual - $this->leituraAnterior;
    }

    public function estimarConta(float $precoPorM3): float
    {
        if ($precoPorM3 <= 0) {
            throw new InvalidArgumentException("Preço por metro cubico inválido, deve ser maior que 0");
        }

        return $this->consumoUltimoPeriodo() * $precoPorM3;
    }

    public function resumo(): string
    {
        return "Leitura atual: $this->leituraAtual" . PHP_EOL . "Leitura anterior: $this->leituraAnterior" . PHP_EOL . "Consumo: {$this->consumoUltimoPeriodo()}";
    }
}

?>