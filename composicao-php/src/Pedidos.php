<?php

namespace App;

class Pedidos
{
    public function __construct(
        private Produto $produto,
        private int $quantidade
    ) {}

    public function total(): float
    {
        return $this->produto->getPreco() * $this->quantidade;
    }

    public function detalhes(): string
    {
        return "Produto: {$this->produto->getNome()}" . PHP_EOL . "Preco: {$this->produto->getPreco()}" . PHP_EOL . "Preço total: {$this->total()}";
    }
}
