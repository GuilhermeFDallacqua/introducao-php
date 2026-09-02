<?php

namespace App;

use InvalidArgumentException;

class ConfiguracaoJogo
{
    public function __construct(
        private int $volume,
        private string $dificuldade,
        private bool $telaCheia
    ) {
        if ($this->volume < 0 || $this->volume > 100) {
            throw new InvalidArgumentException("O volume não pode ser menor que 0 nem maior que 100.");
        }

        if (!in_array($this->dificuldade, ['facil', 'normal', 'dificil'], true)) {
            throw new InvalidArgumentException("Dificuldade inválida, tente apenas facil, normal ou dificil.");
        }
    }

    public function alterarVolume(int $valor): void
    {
        if ($valor < 0) {
            $this->volume = max(0, $this->volume + $valor);
        } elseif ($valor == 0) {
            throw new InvalidArgumentException("Impossivel aumentar ou diminuir quando seu valor é 0.");
        } else {
            $this->volume = min(100, $this->volume + $valor);
        }
    }

    public function alterarDificuldade(string $dificuldade): void
    {
        if (!in_array($this->dificuldade, ['facil', 'normal', 'dificil'], true)) {
            throw new InvalidArgumentException("Dificuldade inválida, tente apenas facil, normal ou dificil.");
        }

        $this->dificuldade = $dificuldade;
    }

    public function alternarTelaCheia(bool $telaCheia): void
    {
        $this->telaCheia = $telaCheia;
    }

    public function resumo(): string
    {
        return "Volume: " . $this->volume . "\nDificuldade: " . $this->dificuldade . "\nTela cheia: " . ($this->telaCheia ? "Sim" : "Não");
    }
}

?>