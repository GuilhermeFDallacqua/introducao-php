<?php

namespace App;

use InvalidArgumentException;

class CronometroTreino
{
    public function __construct(
        public string $atividade,
        private int $segundosAcumulados
    ) {
        if ($this->segundosAcumulados != 0) {
            throw new InvalidArgumentException("O cronômetro deve iniciar em 0.");
        }
    }

    public function adicionarTempo(int $tempo): bool
    {
        if ($tempo <= 0) {
            echo "Tempo inválido, deve ser maior que 0.";
            return false;
        }

        $this->segundosAcumulados+=$tempo;
        return true;
    }
    
    public function zerar(): void
    {
        $this->segundosAcumulados = 0;
    }

    public function totalMinutos(): float
    {
        return $this->segundosAcumulados / 60;
    }

    public function formatarTempo(): string
    {
        return round($this->totalMinutos() / 60) . ":" . round($this->totalMinutos()) . ":" . $this->segundosAcumulados;
    }
}

?>