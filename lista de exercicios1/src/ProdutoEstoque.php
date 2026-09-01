<?php

namespace App;

use InvalidArgumentException;

class ProdutoEstoque
{
    public function __construct(
        private string $nome,
        private float $preco,
        private int $estoque
    ) {
        if (empty($this->nome)) {
            throw new InvalidArgumentException("O nome não pode estar vazio.");
        }

        if ($this->preco <= 0) {
            throw new InvalidArgumentException("O preço deve ser maior que 0.");
        }

        if ($this->estoque < 0) {
            throw new InvalidArgumentException("O estoque inicial deve ser um número positivo (maior ou igual a 0).");
        }
    }

    public function aplicar_desconto(float $desconto): void
    {
        if ($desconto <= 0) {
            throw new InvalidArgumentException("Valor de desconto inválido, o valor deve ser maior que 0.");
        }

        if ($desconto > 50) {
            throw new InvalidArgumentException("Valor de desconto alto de mais, o valor deve ser menor ou igual a 50%.");
        }

        $this->preco -= $this->preco * $desconto / 100;
    }

    public function repor(int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException("Quantidade inválida, não é possivel repor uma quantidade negativa ou 0.");
        }

        $this->estoque += $quantidade;
    }

    public function reservar(int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException("Quantidade inválida, não é possivel reservar uma quantidade negativa ou 0.");
        }

        if ($quantidade > $this->estoque) {
            throw new InvalidArgumentException("Quantidade inválida, não é possivel reservar uma quantidade maior que o estoque.");
        }

        $this->estoque -= $quantidade;
    }

    public function consultar_produto(): string
    {
        return "O preço do produto {$this->nome} é {$this->preco} e tem {$this->estoque} produtos em estoque.";
    }
}

?>