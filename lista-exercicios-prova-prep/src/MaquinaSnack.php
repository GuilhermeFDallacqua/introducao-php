<?php

namespace App;

use InvalidArgumentException;

class MaquinaSnack
{
    public function __construct(
        public string $produto,
        private float $preco,
        private int $estoque = 0,
        private float $credito = 0
    ) { 
        if ($this->preco <= 0) {
            throw new InvalidArgumentException("Preço inválido, o valor deve ser maior que 0.");
        }
    }

    public function reabastecer(int $quantidade): bool
    {
        if ($quantidade <= 0) {
            echo "Quantidade inválida, para reabastecer o estoque, o valor deve ser maior que 0." . PHP_EOL;
            return false;
        }
        
        $this->estoque += $quantidade;
        return true;
    }

    public function inserirCredito(float $valor): bool
    {
        if ($valor <= 0) {
            echo "Valor inválido, você só pode inserir valores maiores que 0." . PHP_EOL;
            return false;
        }
        
        $this->credito += $valor;
        return true;
    }

    public function comprar(): bool
    {
        if ($this->estoque === 0) {
            echo "Sem estoque no momento." . PHP_EOL;
            return false;
        }

        if ($this->credito < $this->preco) {
            echo "Saldo insuficiente" . PHP_EOL;
            return false;
        }

        $this->credito -= $this->preco;
        $this->estoque -= 1;
        echo "Compra realizada com êxito." . PHP_EOL;
        return true;
    }

    public function devolverCredito(): float
    {
        $valorDevolvido = $this->credito;
        $this->credito = 0;

        echo "Devolução realizada com êxito." . PHP_EOL;
        return $valorDevolvido;
    }

    public function status(): string
    {
        return "Produto: $this->produto" . PHP_EOL . "Preço: $this->preco" . PHP_EOL . "Estoque: $this->estoque" . PHP_EOL . "Crédito: $this->credito";
    }
}

?> 