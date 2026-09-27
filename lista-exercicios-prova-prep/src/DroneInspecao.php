<?php

namespace App;

use InvalidArgumentException;

class DroneInspecao
{
    public function __construct(
        public string $modelo,
        private int $bateria,
        private float $distanciaTotal = 0,
        private bool $emVoo = false
    ) {
        if ($this->bateria < 0 || $this->bateria > 100) {
            throw new InvalidArgumentException("Bateria inválida, deve estar entre 0 e 100.");
        }
    }

    public function decolar(): bool
    {
        if ($this->bateria < 20) {
            echo "Impossivel decolar, bateria insuficiente." . PHP_EOL;
            return false;
        }

        return true;
    }

    public function voar(float $km): bool
    {
        if ($this->decolar() !== true) {
            echo "impossivel voar, é necessario decolar antes." . PHP_EOL;
            return false;
        }

        $this->emVoo = true;

        $consumo = $km * 5;

        if ($consumo > $this->bateria) {
            $this->bateria = 0;
            $this->distanciaTotal += $km - (($consumo - $this->bateria) / 5);  
            echo "Bateria insuficiente para voar $km quilômetros, o maximo percorrido foi " . $km - (($consumo - $this->bateria) / 5) . "quilômetros." . PHP_EOL; 
            $this->emVoo = false;
            return false;
        }

        $this->bateria -= $consumo;
        $this->distanciaTotal += $km;
        return true;
    }

    public function pousar(): bool
    {
        if ($this->emVoo !== true) {
            echo "Impossivel pousar, o drone ja esta em pouso." . PHP_EOL;
            return false;
        }

        $this->emVoo = false;
        return true;
    }

    public function recarregar(int $carga): int
    {
        $cargaPassada = $this->bateria;
        $this->bateria = min(100, $this->bateria + $carga);
        
        if ($this->bateria + $carga > 100) {
            echo "Carga alta demais, foi recarregado " . $this->bateria - $cargaPassada . "%" . PHP_EOL;
        }
        
        return $this->bateria - $cargaPassada;
    }

    public function status(): string
    {
        return "Bateria: $this->bateria%" . PHP_EOL . "Distância: $this->distanciaTotal" . PHP_EOL . "Situação de voo:" . ($this->emVoo ? "Em voo" : "Em pouso");
    }
}

?>