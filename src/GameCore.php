<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class GameCore
{
    private $name = null;
    private $game;
    private $currentAnswer = null;

    public function __construct(AGame $game)
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

    public function confirmCorrectAnswer()
    {
        line('Correct!');
    }

    public function tellCorrectAnswer()
    {
        line("'{$this->currentAnswer}' is wrong answer ;(. Correct answer was '{$this->game->getLastCorrectAnswer()}'.");
    }

    public function checkAnswer($questionData, $answer)
    {
        $correctAnswer = $this->game->getCorrectAnswer($questionData);
        return $correctAnswer == $answer;
    }

    public function giveTry()
    {
        line('');
        [$questionText, $questionData] = $this->game->getQuestionInfo();
        line("Question: " . $questionText);

        $answer = prompt('Your answer');
        $this->currentAnswer = $answer;

        return $this->checkAnswer($questionData, $answer);
    }

    public function play()
    {
        $this->welcome();
        $this->getName();

        $triesAmount = 3;

        $isLost = false;
        for ($i = 0; $i < $triesAmount; $i++) {
            if (!$this->giveTry()) {
                $this->tellCorrectAnswer();
                $isLost = true;
                break;
            } else {
                $this->confirmCorrectAnswer();
            }
        }
        
        if ($isLost) {
            $this->loseGame();
        } else {
            $this->winGame();
        }

    }
}