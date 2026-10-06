<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Mochila;
use App\Jogador;

$mochila = new Mochila(100);

function coletar($mochila, $peso):void
{
    if ($mochila->adicionarPeso($peso)) {
        echo "Peso adicionado com sucesso" . PHP_EOL;
        return;
    }

    echo "ops! Houve algum problema." . PHP_EOL;
}

$jogador = new Jogador('Cleber', 100, $mochila);

$mochila->adicionarPeso(50);


echo $jogador->status();