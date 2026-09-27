<?php

namespace App;

use InvalidArgumentException;

class RoboArena
{
    public function __construct(
        public string $nome,
        private int $energia,
        private int $integridadeStruct = 100,
        private int $pontDesempenho = 0
    ) {
        if ($this->energia < 0 || $this->energia > 100) {
            throw new InvalidArgumentException("Energia inválida, deve ser maior ou igual a 0 e menor que 100.");
        }
    }

    public function treinar(): bool
    {
        if ($this->energia < 20) {
            echo "Impossivel treinar, energia baixa de mais." . PHP_EOL;
            return false;
        }

        $this->energia -= 20;
        $this->pontDesempenho += 20;
        echo "Treinamento feito com sucesso." . PHP_EOL;
        return true;
    }

    public function combate(): bool
    {
        if ($this->energia < 50 || $this->integridadeStruct === 0) {
            echo "impossivel participar de um combate, é necessario que a energia seja maior ou igual a 50 e que sua integridade não esteja zerada." . PHP_EOL;
            return false;
        }

        $this->energia -= 50;
        $this->integridadeStruct -= 30;

        if ($this->integridadeStruct !== 0) {
            $this->pontDesempenho += 100;
            echo "Combate feito com sucesso." . PHP_EOL;
            return true;
        }

        $this->pontDesempenho += 50;
        echo "Combate feito com sucesso." . PHP_EOL;
        return true;
    }

    public function recarregar(int $valorRecarga): bool
    {
        if ($this->energia === 100) {
            echo "O robo ja esta com a carga no maximo, impossivel recarregar mais." . PHP_EOL;
            return false;
        }

        $this->energia = min(100, $this->energia + $valorRecarga);
        echo "Recarga feita com êxito." . PHP_EOL;
        return true;
    }

    public function restaurarIntegridade(int $integridade): bool
    {
        if ($this->integridadeStruct === 100) {
            echo "Integridade já esta maximizada, impossivel restaurar mais." . PHP_EOL;
            return false;
        }

        $this->integridadeStruct = min(100, $this->integridadeStruct + $integridade);
        echo "Robo consertado com êxito." . PHP_EOL;
        return true;
    }

    public function status(): string
    {
        return "Nome: $this->nome" . PHP_EOL . "Energia: $this->energia" . PHP_EOL . "Integridade estrutural: $this->integridadeStruct" . PHP_EOL . "Pontuação: $this->pontDesempenho";
    }
}

?>