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
}

?>