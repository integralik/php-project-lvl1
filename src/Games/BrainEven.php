<?php

namespace Brain\Games\Games;

use Brain\Games\IGame;
use function cli\line;
use function cli\prompt;

class BrainEven implements IGame
{
    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getQuestionText()
    {
        $max_number = 100;
        $info = rand(0, $max_number);
        $text = $info;
        return [$text, $info];
    }
    
    public function checkAnswer($number, $answer)
    {
        if ($number % 2 === 0 && $answer === 'yes') {
            return true;
        }
        if ($number % 2 === 1 && $answer === 'no') {
            return true;
        }
        return false;
    }
}
