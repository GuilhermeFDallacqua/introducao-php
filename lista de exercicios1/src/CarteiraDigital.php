<?php

namespace App;

use InvalidArgumentException;

class CarteiraDigital
{
    private float $gastoHoje = 0.0;

    public function __construct(
        private string $proprietario,
        private float $saldo,
        private float $limiteDiario
    ) {
        if (trim($this->proprietario) === '') {
            throw new InvalidArgumentException("O proprietário não pode ser vazio.");
        }

        if ($this->saldo < 0) {
            throw new InvalidArgumentException("O saldo inicial não pode ser menor que 0.");
        }

        if ($this->limiteDiario <= 0) {
            throw new InvalidArgumentException("O limite diário deve ser um valor positivo.");
        }
    }

    public function receber(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException("Você não pode receber valores iguais ou menores que 0.");
        }

        $this->saldo += $valor;
    }

    public function pagarPix(float $valor): void
    {
        $this->validarPagamento($valor);

        $this->saldo -= $valor;
        $this->gastoHoje += $valor;
    }

    private function validarPagamento(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor do Pix não pode ser igual ou menor que 0.");
        }

        if ($valor > $this->saldo) {
            throw new InvalidArgumentException("Saldo insuficiente.");     
        }

        if (($this->gastoHoje + $valor) > $this->limiteDiario) {
            throw new InvalidArgumentException("Limite diário excedido.");
        }
    }

    public function iniciarNovoDia(): void
    {
        $this->gastoHoje = 0;
    }

    public function consultarSaldo(): float
    {
        return $this->saldo;
    }

    public function consultarLimiteDiario(): float
    {
        return $this->limiteDiario;
    }

    public function resumo(): string
    {
        return "Proprietário: {$this->proprietario}\nSaldo: R$ {$this->saldo}\nLimite Diário: R$ {$this->limiteDiario}\nGasto hoje: R$ {$this->gastoHoje}";
    }
}