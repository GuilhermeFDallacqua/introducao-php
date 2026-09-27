<?php

namespace App;

use InvalidArgumentException;

class CofrinhoMeta
{
    public function __construct(
        public string $objetivo,
        private float $saldo,
        private float $meta
    ) {
        if ($this->meta <= 0) {
            throw new InvalidArgumentException("Valor de meta inválido, a meta deve ser maior que 0.");
        }
    }

    public function depositar(float $valor): bool
    {
        if ($valor <= 0) {
            echo "valor inválido, o depósito funciona apenas com numeros maiores que 0" . PHP_EOL;
            return false;
        }

        $this->saldo += $valor;
        return true;
    }

    public function retirar(float $valor): bool
    {
        if ($valor > $this->saldo) {
            echo "Valor inválido, saldo insuficiente." . PHP_EOL;
            return false;
        }

        if ($valor <= 0) {
            echo "Valor inválido, o valor a ser retirado deve ser maior que 0." . PHP_EOL;
            return false;
        }

        $this->saldo -= $valor;
        return true;
    }

    public function percentualDaMeta(): float
    {
        return ceil(($this->saldo * 100) / $this->meta);
    }

    public function metaAtingida(): bool
    {
        if ($this->saldo >= $this->meta) {
            return true;
        }

        return false;
    }

    public function resumo(): string
    {
        return "Objetivo: $this->objetivo" . PHP_EOL . "Saldo: $this->saldo" . PHP_EOL . "Meta: $this->meta" . PHP_EOL . "Progresso: {$this->percentualDaMeta()}%";
    }
}

?>