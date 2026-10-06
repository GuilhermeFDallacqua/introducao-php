<?php

namespace App;

class Produto
{
    public function __construct(
        private string $nome,
        private float $preco
    ) {}

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
}
