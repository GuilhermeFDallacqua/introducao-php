<?php

    #exercicio 1

    echo "Guilherme Ferraresi Dallacqua, 18 anos, Quintana SP";

    #exercicio 2

    $nome = "Guilherme Ferraresi Dallacqua";
    $profissao = "Analista de segurança";
    $hobby = "Pescar";

    echo "Meu nome é $nome, sou $profissao e gosto de $hobby";

    #exercicio 3

    $num1 = readline("Digite o primeiro número: ");
    $num2 = readline("Digite o segundo número: ");

    echo "A soma é " . ($num1 + $num2) . ". A subtração é " . ($num1 - $num2) . ". A multiplicação é " . ($num1 * $num2) . ". A divisão é " . ($num1 / $num2) . ". E o resto da divisão é " . ($num1 % $num2) . "."; 

    #exercicio 4

    $idade = readline("Digite sua idade: ");

    if ($idade >= 18) {
        echo "Maior de idade.";
    } else {
        echo "Menor de idade";
    }

    #exercicio 5

    $nota = readline("Digite sua nota: ");

    if ($nota >= 7) {
        echo "Aprovado.";
    } elseif ($nota >= 5) {
        echo "Recuperação";
    } else {
        echo "Reprovado";
    }

    #exercicio 6

    $num = readline("Digite um número: ");
    $contador = 0;

    while ($contador <= 10) {
        echo $num * $contador . " ";
        $contador++;
    }

    #exercicio 7

    for ($i = 0; $i <= 50; $i++) {
        if (!($i & 1)) {
            echo $i . " ";
        }
    }

    #exercicio 8

    for ($i = 1; $i <= 100; $i++) {
        echo $i;
        if ($i & 1) {
            echo " ímpar\n";
        } else {
            echo " par\n";
        }
    }

    #exercicio 9

    $frutas = ["maçã", "pera", "abacaxi", "melancia", "banana"];

    foreach ($frutas as $i) {
        echo $i . "\n";
    }

    #exercicio 10

    $carro = [
        "marca" => "BMW",
        "modelo" => "i3",
        "ano" => "2017"
    ];

    echo $carro["marca"], $carro["modelo"], $carro["ano"];

    #exercicio 11

    $alunos = [
        ["Tomás", 0, 0, 0],
        ["Trevisan", 7, 8, 10],
        ["Ferraresi", 10, 10, 10]
    ];
 
    echo $alunos[0][0] . " " . ($alunos[0][1] + $alunos[0][2] + $alunos[0][3]) / 3 . "\n" . $alunos[1][0] . " " . ($alunos[1][1] + $alunos[1][2] + $alunos[1][3]) / 3 . "\n" . $alunos[2][0] . " " . ($alunos[2][1] + $alunos[2][2] + $alunos[2][3]) / 3;

    #exercicio 12

    $cidades = ["quintana", "pompeia", "marilia", "adamantina", "garça"];
    $moradia = readline("Diga onde você mora: ");

    if (in_array($moradia, $cidades)) {
        echo "A $moradia está na lista.";
    } else {
        echo "A $moradia não está na lista";
    }

    #exercicio 13

    $num1 = readline("Digite o número 1: ");
    $num2 = readline("Digite o número 2: ");
    $num3 = readline("Digite o número 4: ");

    function media($num1, $num2, $num3) {
        return ($num1 + $num2 + $num3) / 3;
    }

    echo media($num1, $num2, $num3);

    #exercicio 14

    $idade = readline("Digite sua idade: ");

    function verificarIdade($idade) {
        if ($idade >= 18) {
            return "Maior de idade";
        } else {
            return "Menor de idade";
        }
    }

    echo verificarIdade($idade);

    #exercicio 15

    $lista = [];

    while (true) {
        $adicionarOuSair = strtolower(readline("Digite o elemento que deseja adicionar a lista de comprar ou 'sair' para sair: "));

        if ($adicionarOuSair == 'sair') {
            break;
        }

        $lista[] = $adicionarOuSair;
    }

    foreach ($lista as $i) {
        echo $i . "\n";
    }
?>
