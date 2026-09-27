<?php

namespace App;

class PacoteEntrega
{

    public function __construct(
        public string $codigo,
        public string $destino,
        private string $status = 'aguardando',
        private int $tentativas = 0
    )
    {}

    public function sairParaEntrega(): bool
    {
        if ($this->status === 'entregue' || $this->status === 'devolucao' || $this->status === 'em_rota') {
            return false;
        }

        $this->tentativas++;
        $this->status = 'em_rota';
        return true;
    }

    public function registrarFalha(): bool
    {

        if ($this->status !== 'em_rota') {
            return false;
        }

        if ($this->tentativas >= 3) {
            $this->status = 'devolucao';
        } else {
            $this->status = 'aguardando';
        }

        return true;
    }

    public function confirmarEntrega(): bool
    {

        if ($this->status !== 'em_rota') {
            return false;
        }

        $this->status = 'entregue';
        return true;
    }

    public function statusAtual(): string
    {
        return "Pacote: $this->codigo" . PHP_EOL . "Status: $this->status" . PHP_EOL . "Tentativas: $this->tentativas";
    }
}