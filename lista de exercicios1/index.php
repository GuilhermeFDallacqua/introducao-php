<?php

#Guilherme Ferraresi Dallacqua, 2199285, BCC-C, disciplica: Progrmação orientada a objetos

use App\PersonagemRPG;

require_once __DIR__ . '/vendor/autoload.php';

#Exercicio 1

use App\Retangulo;

$retangulo1 = new Retangulo(12, 10);
$retangulo2 = new Retangulo(4, 2);
$retangulo3 = new Retangulo(3, 3);

echo "A area é " . $retangulo1->area() . ", o perimetro é " . $retangulo1->perimetro() . ", é um quadrado? " . ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
echo "A area é " . $retangulo2->area() . ", o perimetro é " . $retangulo2->perimetro() . ", é um quadrado? " . ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
echo "A area é " . $retangulo3->area() . ", o perimetro é " . $retangulo3->perimetro() . ", é um quadrado? " . ($retangulo3->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

$retangulo1->redimensionar(5, 5);
echo "A area é " . $retangulo1->area() . ", o perimetro é " . $retangulo1->perimetro() . ", é um quadrado? " . ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

$retangulo2->redimensionar(10, -1);
echo "A area é " . $retangulo2->area() . ", o perimetro é " . $retangulo2->perimetro() . ", é um quadrado? " . ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

#Exercicio 2

use App\ContaBancaria;

$conta1 = new ContaBancaria("Rogério", 1000);
$conta2 = new ContaBancaria("Alissa", 200);

$conta1->depositar(100);
$conta1->sacar(200);

$conta2->depositar(1000000);
$conta2->sacar(1000200);

echo $conta1->consultar_saldo() . PHP_EOL;
echo $conta2->consultar_saldo() . PHP_EOL;

$conta1->depositar(-100);
$conta1->sacar(1200);

#Exercicio 3

use App\Aluno;

$aluno1 = new Aluno("Tomás", 111111, [0, 0, 0, 1]);
$aluno2 = new Aluno("Trevisan", 222222, [5, 5, 5, 6]);
$aluno3 = new Aluno("Ferraresi", 333333, [10, 10, 10, 10]);

echo $aluno1->resumo() . PHP_EOL;
echo $aluno2->resumo() . PHP_EOL;
echo $aluno3->resumo() . PHP_EOL;

$aluno1->adicionarNotas(-10);

#Exercicio 4


use App\ProdutoEstoque;

$produto1 = new ProdutoEstoque("Fanta", 8, 10);
$produto2 = new ProdutoEstoque("Carvão", 30, 5);

echo $produto2->consultar_produto() . PHP_EOL;

$produto2->aplicar_desconto(5);
$produto2->repor(7);
$produto2->reservar(10);

echo $produto2->consultar_produto() . PHP_EOL;

$produto2->aplicar_desconto(51);
$produto2->reservar(3);

echo $produto2->consultar_produto() . PHP_EOL;

#Exercicio 5

use App\TermostatoInteligente;

$termostatoSituacao1 = new TermostatoInteligente(25.0, 22.0);
echo "Ação necessária: " . $termostatoSituacao1->acaoNecessaria() . PHP_EOL;

$termostatoSituacao1->ligar();
echo "Ação necessária: " . $termostatoSituacao1->acaoNecessaria() . PHP_EOL;

$termostatoSituacao2 = new TermostatoInteligente(16.0, 22.0);
echo "Ação necessária: " . $termostatoSituacao2->acaoNecessaria() . PHP_EOL;

$termostatoSituacao2->ligar();
echo "Ação necessária: " . $termostatoSituacao2->acaoNecessaria() . PHP_EOL;

$termostatoSituacao3 = new TermostatoInteligente(22.0, 22.0);
echo "Ação necessária: " . $termostatoSituacao3->acaoNecessaria() . PHP_EOL;

$termostatoSituacao3->ligar();
echo "Ação necessária: " . $termostatoSituacao3->acaoNecessaria() . PHP_EOL;

$termostatoSituacao1->definirTemperaturaAlvo(15);

#Exercicio 6

$personagem1 = new PersonagemRPG("Bjorn", 100, 100, 100);
$personagem2 = new PersonagemRPG("Thor", 1000, 1000, 100);

$personagem2->executarAtaque(10, 90);
$personagem1->sofrerDano(90);;
$personagem1->curar(50);
$personagem1->descansar();

$personagem2->executarAtaque(100, 900);
$personagem1->curar(1000);

$personagem1->sofrerDano(60);
$personagem1->executarAtaque(10, 10);

?>