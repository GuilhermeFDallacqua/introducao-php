<?php

namespace App;

class Mago extends Personagem
{
    public function atacar(): string
    {
        if (!$this->gastarEnergia(30)) {
            return $this->getNome() . ' está sem energia para atacar.';
        }

        return $this->getNome() . ' atacou com o cajado!';
    }
}