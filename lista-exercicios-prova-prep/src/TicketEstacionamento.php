<?php

namespace App;

use InvalidArgumentException;

class TicketEstacionamento
{
    public function __construct(
        public string $placa,
        private int $entradaMin,
        private float $tarifaHora,
        private ?int $saidaMin = null
    ) {
        if ($this->entradaMin < 0) {
            throw new InvalidArgumentException("O minuto de entrada não pode ser negativo.");
        }

        if ($this->tarifaHora <= 0) {
            throw new InvalidArgumentException("A tarifa por hora deve ser maior que zero.");
        }
    }

    public function registrarSaida(int $minuto): bool
    {
        if ($minuto <= $this->entradaMin) {
            echo "Horário de saida inválido, o horario de saida deve ser maior que o horario de entrada." . PHP_EOL;
            return false;
        }

        if ($this->saidaMin != null) {
            echo "Saida ja registrada, impossivel registrar mais de uma saida para a mesma entrada." . PHP_EOL;
            return false;
        }

        $this->saidaMin = $minuto;
        return true;
    }

    public function duracaoMin(): int
    {
        if ($this->saidaMin === null) {
            return 0;
        }

        return $this->saidaMin - $this->entradaMin;
    }

    public function valorAPagar(): float
    {
        return ceil(($this->duracaoMin() / 60)) * $this->tarifaHora;
    }

    public function resumo(): string
    {
        return "Placa: $this->placa" . PHP_EOL . "Duração: {$this->duracaoMin()}min" . PHP_EOL . "Valor a pagar: {$this->valorAPagar()} Reais";
    }
}