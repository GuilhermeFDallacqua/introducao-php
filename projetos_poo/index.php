<?php

require_once __DIR__ . '/vendor/autoload.php';

#isso é importa e usa a classe pessoa no código principal
use App\Pessoa;

#criamos nosso primeiro objeto em PHP usando POO
#a palavra new cria um novo objeto/instancia
$pessoaJoao = new Pessoa('João', 22);
$pessoaEu = new Pessoa('Guilherme', 18);

echo $pessoaJoao->apresentar() . PHP_EOL;
echo $pessoaEu->apresentar() . PHP_EOL;

#1. Criar classe produto com 
    #nome, categoria, marca e preço
    #função detalhes() que retorna string
    #criar 2 objetos

use App\Produto;

$produtoUm = new Produto('Picanha', 'alimentícia', 'swift', 90);
$produtoDois = new Produto('Coca cola', 'bebida', 'coca cola', 10);

echo $produtoUm->detalhes() . PHP_EOL;
echo $produtoDois->detalhes() . PHP_EOL;

#2. criar classe aluno com
    #nome, RA, curso, semestre
    #função apresentar() que retorna string
    #criar 2 objetos

use App\Aluno;

$alunoUm = new Aluno('Tomás', '2234523', 'BCC', 'primeiro');
$alunoDois = new Aluno('Trevisan', '1113334', 'ADS', 'segundo');

echo $alunoUm->apresentar() . PHP_EOL;
echo $alunoDois->apresentar() . PHP_EOL;


?>