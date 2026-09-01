<?php

namespace App;

use InvalidArgumentException;

class PersonagemRPG
{
    public function __construct(
        private string $nome,
        private int $vidaMaxima,
        private int $vidaAtual,
        private int $energia
    ) {
        if (empty($this->nome)) {
            throw new InvalidArgumentException("O nome do personagem não pode estar vazio.");
        }

        if ($this->vidaMaxima < 0) {
            throw new InvalidArgumentException("A vida máxima deve ser positiva.");
        }
        
        if ($this->vidaAtual != $this->vidaMaxima) {
            throw new InvalidArgumentException("Vida atual inválida, sua vida atual deve ser igual a vida máxima na criação do personagem.");
        }

        if ($this->energia != 100) {
            throw new InvalidArgumentException("Energia inválida, na criação do personagem a energia não pode ser diferente de 100.");
        }
    }

    public function sofrerDano(int $dano): void
    {
        if ($dano < 0) {
            throw new InvalidArgumentException("O dano não pode ser um número a baixo de 0");
        }

        if ($dano > $this->vidaAtual) {
            throw new InvalidArgumentException("Dano alto de mais, seu personagem ficará com a vida abaixo de 0, o dano deve ser menor ou igual a sua vida atual.");
        }

        $this->vidaAtual -= $dano;
    }

    public function curar(int $pontos): void
    {
        if ($pontos <= 0) {
            throw new InvalidArgumentException("Pontos de cura inválidos, o número da cura deve ser maior que 0.");
        }

        if ($pontos > $this->vidaMaxima) {
            throw new InvalidArgumentException("Os pontos de cura estão mais altos que sua vida maxima, você deve curar uma quantidade igual ou menor que sua vida maxima.");
        }

        $this->vidaAtual += $pontos;
    }

    public function executarAtaque(int $custoEnergia, int $danoBase): int
    {
        if ($this->vidaAtual == 0) {
            throw new InvalidArgumentException("Impossível realizar um ataque, seu personagem foi derrotado.");
        }

        if  ($this->energia < $custoEnergia) {
            throw new InvalidArgumentException("Energia insuficiente para realizar um ataque desse.");
        }

        $this->energia -= $custoEnergia;
        
        return $danoBase;
    }

    public function descansar(): void
    {
        $this->energia = min(100, $this->energia + 25);
    }

    public function estaVivo(): bool
    {
        if ($this->vidaAtual > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function status(): string
    {
        return "Nome: {$this->nome}" . PHP_EOL . "Vida maxima: {$this->vidaMaxima}" . PHP_EOL . "Vida atual: {$this->vidaAtual}" . PHP_EOL . "Energia: {$this->energia}";
    }
}

?>