<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class GameCore
{
    private $name = null;
    private $game;

    public function __construct(IGame $game)
    {
        $this->game = $game;
    }

    private function welcome()
    {
        line('Welcome to Brain Games!');
        line($this->game->getWelcomeMessage());
        line('');
    }

    private function getName()
    {
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        $this->name = $name;
    }

    public function winGame()
    {
        line("Congratulations, {$this->name}!");
    }

    public function loseGame()
    {
        line("Let's try again, {$this->name}!");
    }

    public function giveTry()
    {
        line('');
        [$questionText, $questionData] = $this->game->getQuestionText();
        line("Question: " . $questionText);

        $answer = prompt('Your answer');

        return $this->game->checkAnswer($questionData, $answer);
    }

    public function play()
    {
        $this->welcome();
        $this->getName();

        $triesAmount = 3;

        $isLost = false;
        for ($i = 0; $i < $triesAmount; $i++) {
            if (!$this->giveTry()) {
                $this->loseGame();
                $isLost = true;
                break;
            }
        }
        if (!$isLost) {
            $this->winGame();
        }

    }
}