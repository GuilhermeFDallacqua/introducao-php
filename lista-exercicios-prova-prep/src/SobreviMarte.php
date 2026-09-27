<?php

namespace App;

use InvalidArgumentException;

class SobreviMarte
{
    public function __construct(
        private string $nome,
        private int $vida,
        private int $energia,
        private int $nivelOxigenio = 100,
        private int $cargasDeCilindro = 10
    ) {
        if ($this->vida < 0 || $this->vida > 100) {
            throw new InvalidArgumentException("A vida deve ser maior que 0 e menor que 100.");
        }
        
        if ($this->energia < 0 || $this->energia > 100) {
            throw new InvalidArgumentException("A energia deve ser maior que 0 e menor que 100.");
        }
    }

    public function explorar(): bool
    {
        if ($this->nivelOxigenio === 0) {
            $this->vida -= 25;
        }

        if ($this->energia < 30 || $this->nivelOxigenio < 30) {
            echo "Impossivel explorar uma região com a energia ou o oxigenio menor ou igual a 30." . PHP_EOL;
            return false;
        }

        $this->energia = max(0, $this->energia - 30);
        $this->nivelOxigenio = max(0, $this->nivelOxigenio - 30);
        echo "Região explorada." . PHP_EOL;
        return true;
    }

    public function descansar(int $horas): bool
    {
        if ($this->nivelOxigenio === 0) {
            $this->vida -= 25;
        }

        if ($this->energia === 100) {
            echo "impossivel descansar, sua energia ja está no maximo." . PHP_EOL;
            return false;
        }

        $this->energia = min(100, $this->energia + $horas * 10);
        echo "Descanso realizado com êxito" . PHP_EOL;
        return true;
    }

    public function utilizarCilindro(int $qtndCilindro): bool
    {
        if ($this->nivelOxigenio === 0) {
            $this->vida -= 25;
        }

        if ($this->nivelOxigenio === 0) {
            $this->vida -= 30;
        }

        if ($this->cargasDeCilindro < $qtndCilindro) {
            echo "Impossivel utilizar uma quantidade de cilindros maior que a quantidade possuida." . PHP_EOL;
            return false;
        }

        $this->nivelOxigenio = min(100, $this->nivelOxigenio + $qtndCilindro * 20);
        $this->cargasDeCilindro -= $qtndCilindro;
        echo "Cilindros usados com sucesso." . PHP_EOL;
        return true;
    }

    public function status(): string
    {
        return "Nome: $this->nome" . PHP_EOL . "Vida: $this->vida" . PHP_EOL . "Energia: $this->energia" . PHP_EOL . "Nivel de oxigênio: $this->nivelOxigenio" . PHP_EOL . "Cilindros de oxigênio disponiveis: $this->cargasDeCilindro";
    }

}

?>