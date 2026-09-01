<?php

namespace App;

use InvalidArgumentException;

class Retangulo
{

    public function __construct(
        private float $altura,
        private float $largura
    ) {
        if ($this->altura <= 0) {
            throw new InvalidArgumentException("Altura inválida, seu tamanho deve ser maior que 0.");
        }

        if ($this->largura <= 0) {
            throw new InvalidArgumentException("Largura inválida, seu tamanho deve ser maior que 0.");
        }
    }

    public function area(): float
    {
        return $this->altura * $this->largura;
    }

    public function perimetro(): float
    {
        return ($this->altura * 2) + ($this->largura * 2);
    }

    public function ehQuadrado(): bool
    {
        return $this->altura === $this->largura;
    }

    public function redimensionar(float $altura, float $largura): void
    {
        if ($altura <= 0) {
            throw new InvalidArgumentException("Altura inválida, seu tamanho deve ser maior que 0.");
        }

        if ($largura <= 0) {
            throw new InvalidArgumentException("Largura inválida, seu tamanho deve ser maior que 0.");
        }

        $this->altura = $altura;
        $this->largura = $largura;
    }


}

?>