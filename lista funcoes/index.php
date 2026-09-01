<?php
    
    #exercicio 1

    function saudar($nome) {
        return "olá $nome! seja bem vindo(a)";
    }

    echo saudar(readline("Digite seu nome: "));

    #exercicio 2

    function dobrar($numero) {
        return "Seu dobro é " . $numero * 2;
    }

    echo dobrar(readline("Digite um número: "));

    #exercicio 3

    function somar($num1, $num2) {
        return "Sua soma é " . $num1 + $num2;
    }

    echo somar("Digite um número: ");

    #exercicio 4

    function mensagem($texto = "Sem mensagem") {
        return $texto;
    }

    echo mensagem(readline("Digite sua mensagem: "));

    #exercicio 5

    function quadradro($num) {
        return "Seu quadrado é " . $num * 2;
    }

    function mostrarQuadradro($n) {
        return quadradro($n);
    }

    echo mostrarQuadrado(readline("Digite um número: "));

    #exercicio 6

    $lista_frutas = ["maça", "pera", "banana", "pitaya", "lichia"];

    function contarElementos($lista) {
        return "A quantidade de elementos na lista é " . count($lista);
    }

    echo contarElementos($lista_frutas);

    #exercicio 7

    function verificarAprovacao($nota) {
        if ($nota >= 7) {
            return "Aprovado";
        } elseif ($nota >= 5) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }

    echo verificarAprovacao(readline("Digite o valor da média final: "));

    #exercicio 8

    $lista_numeros = [1,2, 4, 123, 20, 10];

    function separarParesEImpares($nums) {
        $paresEImpares = [
            "pares" => [],
            "impares" => [],
        ];

        foreach($nums as $i) {
            if (!($i & 1)) {
                $paresEImpares["pares"][] = $i;
            } else {
                $paresEImpares["impares"][] = $i;
            }
        }

        return $paresEImpares;
    }

    print_r(separarParesEImpares($lista_numeros));

    #exercicio 9

    $nome = readline("Digite seu nome: ");
    $num1 = readline("Digite a primeira nota: ");
    $num2 = readline("Digite a segunda nota: ");
    $num3 = readline("Digite a terceira nota: ");


    function calcularMedia($num1, $num2, $num3) {
        return ($num1 + $num2 + $num3) / 3;
    }

    function resultadoAluno($nome, $num1, $num2, $num3) {
        if (calcularMedia($num1, $num2, $num3) >= 7) {
            return "O aluno $nome obteve média $media e está Aprovado";
        } elseif (calcularMedia($num1, $num2, $num3) >= 5) {
            return "O aluno $nome obteve média $media e está de Recuperação";
        } else {
            return "O aluno $nome obteve média $media e esta Reprovado";
        }
    }

    echo resultadoAluno($nome, $num1, $num2, $num3);

?>