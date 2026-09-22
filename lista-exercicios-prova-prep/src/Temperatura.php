<?php

namespace App;

use InvalidArgumentException;

class Temperatura
{
    public function __construct(
        private float $celsius
    ) {
        if ($this->celsius < -273.15) {
            throw new InvalidArgumentException("Temperatura inválida.");
        }
    }

    public function alterar(float $novoValor): bool
    {
        if ($this->celsius < -273.15) {
            echo "Temperatura inválida";
            return false;
        }

        $this->celsius = $novoValor;
        return true;
    }

    public function emFahrenheit(): float 
    {
        return ($this->celsius * 9 / 5) + 32;
    }

    public function emKelvin(): float
    {
        return $this->celsius + 273.15;
    }

    public function descricao(): string
    {
        return "Celsius: $this->celsius" . PHP_EOL . "Fahrenheit: {$this->emFahrenheit()}" . PHP_EOL . "Kelvin: {$this->emKelvin()}";
    }
}

?>