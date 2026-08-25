<?php

#faz parte do PSR-4 (PHP standart recommendation)
#utilizado para o autoload de classes
namespace App;

class Pessoa
{
    #função inicializadora, executada apenas quando um objeto é criado
    public function __construct(
        public string $nome,
        public int $idade
    ) {}

    public function apresentar(): string
    {
        #this é uma palavra reservada que indica que o atributo(variavel) é da classe e não exclusivo da função
        #logo sempre que vou acessar um atributo da classe, uso this
        return "Olá! Meu nome é {$this->nome} e tenho {$this->idade} anos.";
    }
}

?>