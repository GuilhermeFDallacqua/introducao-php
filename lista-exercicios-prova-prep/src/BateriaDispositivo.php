<?php

namespace App;

use InvalidArgumentException;

class BateriaDispositivo
{
    public function __construct(
        public string $dispositivo,
        private int $carga
    ) {
        if ($this->carga < 0 || $this->carga > 100) {
            throw new InvalidArgumentException("Carga inválida, deve estar entre 0 e 100.");
        }
    }

    public function usar(int $minutos): bool
    {
        if ($this->carga === 0 || $minutos <= 0) {
            echo "Carga em falta, impossivel usar." . PHP_EOL;
            return false;
        }

        $consumo = (int) ceil($minutos / 5);

        if ($consumo > $this->carga) {
            $this->carga = 0;
            return false;
        }

        $this->carga -= $consumo;
        return true;
    }

    public function carregar(int $porcento): int
    {
        $cargaPassada = $this->carga;
        $this->carga = min(100, $this->carga + $porcento);
        return $this->carga - $cargaPassada;
    }

    public function nivel(): int
    {
        return $this->carga;
    }

    public function estaCritica(): bool
    {
        if ($this->carga <= 15) {
            return true;
        }

        return false;
    }

    public function status(): string
    {
        return "Dispositivo: $this->dispositivo" . PHP_EOL . "Carga: $this->carga%";
    }
}

?>