<?php

namespace App;

use InvalidArgumentException;

class ContaBancaria
{
    public function __construct(
        private string $titular,
        private float $saldo
    ) {
        if ($this->saldo < 0) {
            throw new InvalidArgumentException("Saldo inválido, deve ser maior ou igual a 0.");
        }

        if (empty($this->titular)) {
            throw new InvalidArgumentException("O nome não pode estar vazio.");
        }
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException("Valor de depósito inválido, deve ser maior que 0.");
        }

        $this->saldo += $valor;
    }

    public function sacar(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException("Valor de saque inválido, deve ser maior que 0.");
        }

        if ($valor > $this->saldo) {
            throw new InvalidArgumentException("Valor de saque inválido, deve ser menor ou igual seu saldo atual.");
        }

        $this->saldo -= $valor;
    }

    public function consultar_saldo(): float
    {
        return $this->saldo;
    }

    public function resumo(): string
    {
        return "A conta bancária do titular {$this->titular} está com R$ {$this->saldo}";
    }
}

?>
