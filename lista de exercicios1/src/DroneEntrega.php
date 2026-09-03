<?php

namespace App;

use InvalidArgumentException;

class DroneEntrega
{
    public function __construct(
        private string $identificador,
        private int $bateria,
        private int $cargaAtualKG,
        private int $cargaMaximaKG,
        private string $status
    ) {
        if (empty($this->identificador)) {
            throw new InvalidArgumentException("Inválido, o identificador não pode estar vazio.");
        }

        if ($this->cargaMaximaKG < 0) {
            throw new InvalidArgumentException("Impossivel a carga maxima ser menor que 0.");
        }

        if ($this->bateria != 100) {
            throw new InvalidArgumentException("Bateria inválida, o drone deve começar com a bateria cheia(100).");
        }

        if ($this->cargaAtualKG != 0) {
            throw new InvalidArgumentException("Carga atual inválida, o drone deve começar vazio(0).");
        }

        if ($this->status != "disponivel") {
            throw new InvalidArgumentException("Status indispónivel, o drone deve começar com o status 'disponível'.");
        }
    }
    public function carregarPacote(float $peso): void
    {
        if ($peso <= 0) {
            throw new InvalidArgumentException("Peso inválido, impossivel adicionar um peso menor ou igual a zero.");
        }

        if ($peso > $this->cargaMaximaKG) {
            throw new InvalidArgumentException("Impossível carregar o drone com um peso maior que a carga máxima suportada.");
        }

        if ($this->status != "disponivel") {
            throw new InvalidArgumentException("Sem drones disponíveis para carregar.");
        }
        $this->cargaAtualKG += $peso;
    }

    public function decolar(float $distancia): void
    {
        if ($this->cargaAtualKG == 0) {
            throw new InvalidArgumentException("Impossivel decolar sem uma carga no drone.");
        }

        if ($this->bateria < $this->consumoEstimado($distancia)) {
            throw new InvalidArgumentException("Bateria insuficiente.");
        }

        $this->bateria -= $this->consumoEstimado($distancia);
        $this->status = "em_voo";
    }

    private function consumoEstimado(float $distanciaKm): int
    {
        #Para cada 1% de bateria, o drone anda 10km;
        return ceil($distanciaKm / 10);
    }

    public function finalizarEntrega(): void
    {
        $this->cargaAtualKG = 0;
        $this->status = "disponivel";
    }

    public function recarregar(): void
    {
        if ($this->status != "disponivel") {
            throw new InvalidArgumentException("Impossivel recarregar o drone quando ele esta em voo.");
        }

        $this->bateria = 100;
    }

    public function status(): string
    {
        return "Identificador: " . $this->identificador . "\nBateria: {$this->bateria}%" . "\nCarga atual: " . $this->cargaAtualKG . "\nCarga máxima: " . $this->cargaMaximaKG . "\nStatus: " . $this->status;
    }
}   

?>