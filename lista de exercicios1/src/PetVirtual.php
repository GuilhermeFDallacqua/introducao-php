<?php

namespace App;

use InvalidArgumentException;

class PetVirtual
{
    public function __construct(
        private string $nome,
        private int $fome,
        private int $energia,
        private int $felicidade
    ) {
        if ($this->fome < 0 || $this->fome > 100) {
            throw new InvalidArgumentException("Fome inválida, deve estar entre 0 e 100.");
        }

        if ($this->energia < 0 || $this->energia > 100) {
            throw new InvalidArgumentException("energia inválida, deve estar entre 0 e 100.");
        }

        if ($this->felicidade < 0 || $this->felicidade > 100) {
            throw new InvalidArgumentException("Felicidade inválida, deve estar entre 0 e 100.");
        }

    }

    public function alimentar(): void 
    {
        $this->fome = $this->limitar($this->fome - 30);
        $this->energia = $this->limitar($this->energia + 5);
        $this->felicidade = $this->limitar($this->felicidade - 7);
    }

    public function brincar(): void
    {
        $this->felicidade = $this->limitar($this->felicidade + 25);
        $this->energia = $this->limitar($this->energia - 30);
        $this->fome = $this->limitar($this->fome + 30);
    }

    public function dormir(): void
    {
        $this->energia = $this->limitar($this->energia + 50);
        $this->fome = $this->limitar($this->fome + 20);
        $this->felicidade = $this->limitar($this->felicidade - 10);
    }

    private function limitar(int $valor): int {
        return max(0, min(100, $valor));
    }

    public function status(): string
    {
        return "Nome: " . $this->nome . "\nFome: " . $this-> fome . "\nEnergia: " . $this->energia . "\nFelicidade: " . $this->felicidade;
    }
}

?>