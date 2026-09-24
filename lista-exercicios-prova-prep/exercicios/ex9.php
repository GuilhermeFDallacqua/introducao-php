<?php

require_once '../vendor/autoload.php';

use App\PersonagemRPG;

$personagem1 = new PersonagemRPG('Cleiton', 'Mago', 100, 100);

$personagem1->receberDano(75);
$personagem1->curar(85);
$personagem1->usarHabilidade(80);
$personagem1->usarHabilidade(75);

echo $personagem1->status();


?>