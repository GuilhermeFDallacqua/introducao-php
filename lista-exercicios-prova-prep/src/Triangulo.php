<?php

namespace App;

use InvalidArgumentException;

class Triangulo
{
    public function __construct(
        private float $ladoA,
        private float $ladoB,
        private float $ladoC
    ) {
        if ($this->ladoA <= 0|| $this->ladoB <= 0 || $this->ladoC <= 0) {
            throw new InvalidArgumentException("Algum dos lados do triângulo esta incorreto, o lado deve ser maior que 0.");
        }
    }

    private function ehValido(): bool
    {
        return $this->ladoA + $this->ladoB > $this->ladoC && $this->ladoA + $this->ladoC > $this->ladoB
            && $this->ladoB + $this->ladoC > $this->ladoA;
    }

    public function classificar(): string
    {
        if (!$this->ehValido()) {
            throw new InvalidArgumentException("Não é possível calcular o perímetro de um triângulo inválido.");
        }

        if ($this->ladoA === $this->ladoB && $this->ladoB === $this->ladoC) {
            return 'Equilátero';
        }

        if ($this->ladoA === $this->ladoB || $this->ladoA === $this->ladoC || $this->ladoB === $this->ladoC) {
            return 'Isósceles';
        }

        return 'Escaleno';
    }

    public function perimetro(): float
    {
        if (!$this->ehValido()) {
            throw new InvalidArgumentException("Não é possível calcular o perímetro de um triângulo inválido.");
        }

        return $this->ladoA + $this->ladoB + $this->ladoC;
    }
}

?>