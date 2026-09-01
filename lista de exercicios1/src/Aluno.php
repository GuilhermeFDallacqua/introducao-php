<?php

namespace App;

use InvalidArgumentException;

class Aluno
{

    public function __construct(
        private string $nome,
        private int $RA,
        private array $notas
    ) {
        if (empty($this->nome)) {
            throw new InvalidArgumentException("Nome inválido, o nome não pode estar vazio.");
        }

        if (empty($this->RA)) {
            throw new InvalidArgumentException("RA inválido, o RA não pode estar vazio.");
        }
    }

    public function adicionarNotas(float $nota): void
    {
        if ($nota < 0) {
            throw new InvalidArgumentException("Nota inválida, a nota deve ser maior ou igual a 0.");
        }

        $this->notas[] = $nota;
    }

    // public function mostrar_notas(): string 
    // {
    //     return "as notas são " . implode(', ', $this->notas);
    // }

    public function calcular_media(): float
    {
        if (empty($this->notas)) {
            throw new InvalidArgumentException("Não há notas para se calcular a média.");
        }

        return array_sum($this->notas) / count($this->notas);
    }

    public function situacao(): string
    {
        if ($this->calcular_media() >= 7) {
            return "Aprovado!";
        } elseif ($this->calcular_media() >= 5) {
            return "Recuperação!"; 
        } else {
            return "Reprovado!";
        }
    }

    public function resumo(): string
    {
        return "Aluno: {$this->nome}, média: {$this->calcular_media()}, situação: {$this->situacao()}";
    }

}

?>