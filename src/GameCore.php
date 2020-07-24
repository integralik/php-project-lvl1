<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class GameCore
{
    public const TRIES_COUNT = 3;

    private $username = null;
    private $game;
    private $currentAnswer = null;

    public function __construct(AGame $game)
    {
        $this->game = $game;
    }

    protected function welcomeUser()
    {
        line('Welcome to Brain Games!');
        line($this->game->getWelcomeMessage());
        line('');
    }

    protected function getUsername()
    {
        $username = prompt('May I have your name?');
        line("Hello, %s!", $username);
        $this->username = $username;
    }

    protected function winGame()
    {
        line("Congratulations, {$this->username}!");
    }

    protected function loseGame()
    {
        line("Let's try again, {$this->username}!");
    }

    protected function confirmCorrectAnswer()
    {
        line('Correct!');
    }

    protected function tellCorrectAnswer()
    {
        line("'{$this->currentAnswer}' is wrong answer ;(. Correct answer was " .
            "'{$this->game->getLastCorrectAnswer()}'.");
    }

    public function checkAnswer($questionData, $answer)
    {
        $correctAnswer = $this->game->getCorrectAnswer($questionData);
        return $correctAnswer == $answer;
    }

    protected function playOnce()
    {
        [$questionText, $questionData] = $this->game->getQuestionInfo();

        line('');
        line("Question: " . $questionText);
        $answer = prompt('Your answer');

        $this->currentAnswer = $answer;

        return $this->checkAnswer($questionData, $answer);
    }

    public function play()
    {
        $this->welcomeUser();
        $this->getUserName();

        $isLost = false;
        for ($i = 0; $i < self::TRIES_COUNT; $i++) {
            if (!$this->playOnce()) {
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
