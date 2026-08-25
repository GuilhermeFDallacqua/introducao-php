<?php

namespace App;

class Produto
{
    public function __construct(
        public string $nome,
        public string $categoria,
        public string $marca,
        public int $preco
    ) {}

    public function detalhes(): string
    {
        return "O produto é {$this->nome}, está na categoria {$this->categoria}, é da marca {$this->marca} e custa {$this->preco} reais";
    }
}

?>