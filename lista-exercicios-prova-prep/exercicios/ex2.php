<?php

require_once '../vendor/autoload.php';

use App\Temperatura;

echo '-----------Temperatura 1-----------' . PHP_EOL;
$temperatura1 = new Temperatura(30);
echo $temperatura1->descricao() . PHP_EOL;
echo '-----------Temperatura 2-----------' . PHP_EOL;
$temperatura2 = new Temperatura(-30);
echo $temperatura2->descricao() . PHP_EOL;
echo '-----------Temperatura 3-----------' . PHP_EOL;
$temperatura3 = new Temperatura(-300);
echo $temperatura3->descricao();


?>