<?php

namespace App;

use InvalidArgumentException;

class TermostatoInteligente
{
    public function __construct(
        private float $temperaturaAtual,
        private float $temperaturaAlvo,
        private bool $ligado = false
    ) {
        if ($this->temperaturaAlvo < 16 || $this->temperaturaAlvo > 30) {
            throw new InvalidArgumentException("Temperatura alvo inválida, ela deve estar entre 16 a 30 graus.");
        }
    }

    public function ligar(): void
    {
        $this->ligado = true;
    }

    public function desligar(): void
    {
        $this->ligado = false;
    }

    public function definirTemperaturaAlvo(float $temperatura): void
    {
        if ($temperatura < 16 || $temperatura > 30) {
            throw new InvalidArgumentException("Temperatura alvo inválida, ela deve estar entre 16 a 30 graus.");
        }

        $this->temperaturaAlvo = $temperatura;
    }

    public function atualizarTemperaturaAtual(float $temperatura): void 
    {
        $this->temperaturaAtual = $temperatura;
    }

    public function acaoNecessaria(): string
    {
        if (!$this->ligado) { 
            return "desligado";
        }

        if ($this->temperaturaAtual < $this->temperaturaAlvo) {
            return "aquecer";
        }

        if ($this->temperaturaAtual > $this->temperaturaAlvo) {
            return "resfriar";
        }

        return "manter";
    }
}