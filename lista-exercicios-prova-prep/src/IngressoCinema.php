<?php

namespace App;

use InvalidArgumentException;

class IngressoCinema
{
    public function __construct(
        public string $filme,
        private float $precoBase,
        private bool $meiaEntrada
    ) {
        if ($this->precoBase <= 0) {
            throw new InvalidArgumentException("Preço base inválido, deve ser maior que zero.");
        }
    }

    public function definirMeiaEntrada(bool $possuiDireito): void
    {
        $this->meiaEntrada = $possuiDireito;
    }

    public function calcularValorFinal(): float
    {
        if ($this->meiaEntrada === true) {
            return $this->precoBase / 2;
        }

        return $this->precoBase;
    }

    public function resumo(): string
    {
        return "Filme: $this->filme" . PHP_EOL . "Possui meia entrada:" . ($this->meiaEntrada ? "Sim" : "Não") . PHP_EOL . "Valor a ser pago: {$this->calcularValorFinal()}";
    }
}

?>
