<?php

namespace App;

use InvalidArgumentException;

class CartaoTransporte
{
    public function __construct(
        public string $titular,
        private float $saldo,
        private float $tarifa,
        private int $viagensRealizadas = 0
    ) {
        if ($this->tarifa <= 0) {
            throw new InvalidArgumentException("Tarifa inválida, o valor da tarifa deve ser maior que 0.");
        }
    }

    public function recarregar(float $valor): bool
    {
        if ($valor <= 0) {
            echo "Valor de recarga indisponivel, o credito a ser recarregado deve ser maior que 0." . PHP_EOL;
            return false;
        }

        $this->saldo += $valor;
        return false;
    }

    public function embarcar(): bool
    {
        if ($this->saldo < $this->tarifa) {
            echo "Saldo insuficiente para esta ação." . PHP_EOL;
            return false;
        }

        $this->saldo -= $this->tarifa;
        $this->viagensRealizadas += 1;
        return true;
    }

    public function saldoAtual(): float
    {
        return $this->saldo;
    }

    public function viagensRealizadas(): int
    {
        return $this->viagensRealizadas;
    }

    public function resumo(): string
    {
        return "Titular: $this->titular" . PHP_EOL . "Saldo: $this->saldo" . PHP_EOL . "Viagens realizadas: $this->viagensRealizadas";
    }
}

?>