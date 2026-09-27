<?php

namespace App;

use InvalidArgumentException;

class PlanoDadosMov
{
    public function __construct(
        public string $plano,
        private float $saldo,
        private float $consumoMes = 0
    ) {
        if ($this->saldo < 0) {
            throw new InvalidArgumentException("Dados possuidos inválido, é necessario que seja maior que 0.");
        }
    }

    public function consumirSaldo(float $valor): bool
    {
        if ($valor > $this->saldo) {
            echo "Impossivel consumir um valor maior que seu saldo." . PHP_EOL;
            return false;
        }

        $this->saldo -= $valor;
        $this->consumoMes += $valor;
        echo "Saldo consumido com sucesso." . PHP_EOL;
        return true;
    }

    public function comprarPacotes(int $valor): bool
    {
        $this->saldo += $valor * 0.1;
        echo "Pacote comprado com sucesso." . PHP_EOL;
        return true;
    }

    public function consultarConsumo(): float
    {
        return $this->consumoMes;
    }

    public function consultarSaldo(): float
    {
        return $this->saldo;
    }

    public function status(): string
    {
        return "Plano: $this->plano" . PHP_EOL . "Saldo: $this->saldo" . PHP_EOL . "Consumo no mês: $this->consumoMes";
    }
}

?>