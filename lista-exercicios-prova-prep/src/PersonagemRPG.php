<?php

namespace App;

use InvalidArgumentException;

class PersonagemRPG
{
    public function __construct(
        public string $nome,
        public string $classe,
        private int $vida,
        private int $energia
    ) {
        if ($this->vida < 0 || $this->vida > 100) {
            throw new InvalidArgumentException("Vida inválida, deve estar entre 0 e 100.");
        }

        if ($this->energia < 0 || $this->energia > 100) {
            throw new InvalidArgumentException("Vida inválida, deve estar entre 0 e 100.");
        }
    }

    public function receberDano(int $pontos): bool
    {
        if ($pontos <= 0) {
            echo "Quantidade de pontos inválida, os pontos devem ser maiores que 0." . PHP_EOL;
            return false;
        }

        $this->vida = max(0, $this->vida - $pontos);

        return true;
    }

    public function curar(int $pontos): bool
    {
        if ($pontos <= 0) {
            echo "Quantidade de pontos inválida, os pontos devem ser maiores que 0" . PHP_EOL;
            return false;
        }

        $this->vida = min(100, $this->vida + $pontos);
        return true;
    }

    public function usarHabilidade(int $custoEnergia): bool
    {
        if ($custoEnergia > $this->energia) {
            echo "Custo alto de mais, energia insuficiente." . PHP_EOL;
            return false;
        }

        if ($this->vida <= 0) {
            echo "Impossível realizar o ataque, seu personagem está morto." . PHP_EOL;
            return false;
        }

        $this->energia -= $custoEnergia;
        return true;
    }

    public function descansar(int $pontos): bool
    {
        $this->energia = min(100, $this->energia + $pontos);
        return true;
    }

    public function status(): string
    {
        return "Nome: $this->nome" . PHP_EOL . "Classe: $this->classe" . PHP_EOL . "Vida: $this->vida" . PHP_EOL . "Energia: $this->energia";
    }
}

?>