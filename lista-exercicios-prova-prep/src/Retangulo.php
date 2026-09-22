<?php

namespace App;

use InvalidArgumentException;

class Retangulo
{
    public function __construct(
        private float $largura,
        private float $altura
    ) {
        if ($this->largura <= 0) {
            throw new InvalidArgumentException("Largura inválida, necessário que seja maior que 0");
        }

        if ($this->altura <= 0) {
            throw new InvalidArgumentException("Altura inválida, necessário que seja maior que 0");
        }
    }

    public function area(): float
    {
        return $this->largura * $this->altura;
    }

    public function perimetro(): float
    {
        return ($this->altura + $this->largura) * 2;
    }

    public function ehQuadrado(): bool
    {
        if ($this->largura === $this->altura) {
            return true;
        } else {
            return false;
        }
    }

}

?>