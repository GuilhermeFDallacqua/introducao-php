<?php

namespace App;

class Aluno
{
    public function __construct(
        public string $nome,
        public int $RA,
        public string $curso,
        public string $semestre
    ) {}

    public function apresentar(): string 
    {
        return "{$this->nome}, {$this->RA}, {$this->curso}, {$this->semestre}";
    }
}

?>