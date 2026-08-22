<?php

    #exercicio 1

    $lista = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];

    $soma = 0;
    $maior = 0;
    $linhaMaior = 0;
    $colunaMaior = 0;

    foreach($lista as $i => $linha) {
        foreach($linha as $j => $item) {
            $soma+=$item;
            if ($maior < $item) {
                $maior = $item;
                $linhaMaior = $i;
                $colunaMaior = $j;
            }
        }
    }

    echo "Total de produtos: $soma \n";
    echo $maior . " (" . $linhaMaior . "," . $colunaMaior . ")\n";

    #exercicio 2

    $lugares = [
        [1, 1, 0, 1, 1],
        [1, 1, 0, 0, 1],
        [0, 0, 0, 1, 0],
        [1, 1, 1, 0, 1]
    ];

    $lugarColuna = 0;
    $lugarLinha = 0;
    $lugaresdisponiveis = 0;

    foreach($lugares as $i => $linha) {
        foreach($linha as $j => $item) {
            if ($item == 0) {
                $lugaresdisponiveis++;
                $lugarLinha = $i;
                $lugarColuna = $j;
            }
        }
    }

    echo "Lugares disponíveis $lugaresdisponiveis";
    echo "Primeiro lugar vazio $lugarlinha";

    #NÃO DEI CONTA DE TERMINAR
?>