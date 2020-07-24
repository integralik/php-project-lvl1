<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainEven extends AGame
{
    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getQuestionInfo()
    {
        $max_number = 100;
        $info = rand(0, $max_number);
        $text = $info;
        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        $number = $questionData;
        if ($number % 2 === 0) {
            $answer = 'yes';
        } else {
            $answer = 'no';
        }
        $this->lastCorrectAnswer = $answer;
        return $answer;
    }
}
