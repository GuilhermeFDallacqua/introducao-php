<?php

namespace App;

class Semaforo
{
    public function __construct(
        public string $local,
        private int $ciclosCompletos = 0,
        private string $cor = 'vermelho',
    ) {}

    public function avancar(): void
    {
        if ($this->cor === 'vermelho') {
            $this->cor = 'verde';
        } elseif ($this->cor === 'verde') {
            $this->cor = 'amarelo';
        } elseif ($this->cor === 'amarelo') {
            $this->cor = 'vermelho';
            $this->ciclosCompletos++;
        }
    }

    public function podePassar(): bool
    {
        if ($this->cor === 'verde') {
            return true;
        }

        return false;
    }

    public function estado(): string
    {
        return "Local: $this->local" . PHP_EOL . "Cor atual: $this->cor" . PHP_EOL . "Quantidade de ciclos completos: $this->ciclosCompletos";
    }
}

?>