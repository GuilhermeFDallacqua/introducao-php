<?php

namespace App;

class Personagem
{
    private string $nome;
    private int $energia = 100;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEnergia(): int
    {
        return $this->energia;
    }

    public function gastarEnergia(int $quantidade): bool
    {
        if ($quantidade <= 0 || $quantidade > $this->energia) {
            return false;
        }

        $this->energia -= $quantidade;
        return true;
    }
}