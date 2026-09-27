<?php

namespace App;

class SmartLocker
{
    public function __construct(
        public readonly string $numeroCompartimento,
        private string $identificacao = '',
        private string $codigoRetirada = '',
        private bool $ocupado = false,
        private int $tentativasIncorretas = 0,
        private bool $bloqueado = false
    ) {}

    public function adicionarPacote(string $identificacao, string $codigoRetirada): bool
    {
        if ($this->bloqueado) {
            echo "Operação recusada: O compartimento está BLOQUEADO." . PHP_EOL;
            return false;
        }

        if ($this->ocupado) {
            echo "Operação recusada: O compartimento já está ocupado." . PHP_EOL;
            return false;
        }

        $this->identificacao = $identificacao;
        $this->codigoRetirada = $codigoRetirada;
        $this->ocupado = true;
        
        echo "Pacote '{$identificacao}' guardado com sucesso no compartimento {$this->numeroCompartimento}." . PHP_EOL;
        return true;
    }

    public function retirarPacote(string $codigoInformado): bool
    {
        if ($this->bloqueado) {
            echo "Operação recusada: O compartimento está BLOQUEADO. Solicite liberação." . PHP_EOL;
            return false;
        }

        if (!$this->ocupado) {
            echo "Operação recusada: Não há encomendas neste compartimento." . PHP_EOL;
            return false;
        }

        if ($codigoInformado !== $this->codigoRetirada) {
            $this->tentativasIncorretas++;
            echo "Código incorreto. Tentativa {$this->tentativasIncorretas} de 3." . PHP_EOL;

            if ($this->tentativasIncorretas >= 3) {
                $this->bloqueado = true;
                echo "ATENÇÃO: Compartimento BLOQUEADO devido a 3 tentativas incorretas." . PHP_EOL;
            }

            return false;
        }

        $this->identificacao = '';
        $this->codigoRetirada = '';
        $this->ocupado = false;
        $this->tentativasIncorretas = 0;

        echo "Retirada concluída com sucesso! Compartimento livre." . PHP_EOL;
        return true;
    }

    public function redefinirEstado(): void
    {
        $this->bloqueado = false;
        $this->tentativasIncorretas = 0;
        echo "Estado do compartimento redefinido com sucesso." . PHP_EOL;
    }

    public function isOcupado(): bool
    {
        return $this->ocupado;
    }

    public function isBloqueado(): bool
    {
        return $this->bloqueado;
    }

    public function getIdentificacao(): string
    {
        return $this->identificacao;
    }
}