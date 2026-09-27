<?php

//Nome: Guilherme Ferraresi Dallacqua; RA: 2199285; Turma: BCC-C

require_once '../vendor/autoload.php';

use App\PacoteEntrega;

$pacote = new PacoteEntrega('PKG123456', 'Rua das Flores, 123 - Centro');

echo "-----------Status Inicial-----------" . PHP_EOL;
echo $pacote->statusAtual() . PHP_EOL;

echo "-----------Tentativa de registrar falha sem estar em rota-----------" . PHP_EOL;
$pacote->registrarFalha();
echo $pacote->statusAtual() . PHP_EOL;

echo "-----------Cenário: Entrega bem-sucedida na 1ª tentativa-----------" . PHP_EOL;
$pacote->sairParaEntrega();
echo $pacote->statusAtual() . PHP_EOL;

$pacote->confirmarEntrega();
echo $pacote->statusAtual() . PHP_EOL;

echo "-----------Tentativa de saída para pacote já entregue-----------" . PHP_EOL;
$pacote->sairParaEntrega();
echo $pacote->statusAtual() . PHP_EOL;

$pacoteDevolucao = new PacoteEntrega('PKG789012', 'Av. Paulista, 1000 - Bela Vista');

echo "-----------1ª Tentativa com falha-----------" . PHP_EOL;
$pacoteDevolucao->sairParaEntrega();
echo $pacoteDevolucao->statusAtual() . PHP_EOL;

$pacoteDevolucao->registrarFalha();
echo $pacoteDevolucao->statusAtual() . PHP_EOL;

echo "-----------2ª Tentativa com falha-----------" . PHP_EOL;
$pacoteDevolucao->sairParaEntrega();
$pacoteDevolucao->registrarFalha();
echo $pacoteDevolucao->statusAtual() . PHP_EOL;

echo "-----------3ª Tentativa com falha (Encaminha para Devolução)-----------" . PHP_EOL;
$pacoteDevolucao->sairParaEntrega();
$pacoteDevolucao->registrarFalha();
echo $pacoteDevolucao->statusAtual() . PHP_EOL;

echo "-----------Bloqueio de 4ª tentativa para pacote em devolução-----------" . PHP_EOL;
$pacoteDevolucao->sairParaEntrega();
echo $pacoteDevolucao->statusAtual() . PHP_EOL;

?>