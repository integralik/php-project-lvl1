<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainPrime extends AGame
{
    public const MAX_NUMBER = 100;


    public $lastCorrectAnswer = null;

    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    }

    public function getQuestionInfo()
    {
        $number = rand(0, self::MAX_NUMBER);

        $text = $number;
        $info = $number;

        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        $number = $questionData;

        if ($number == 0 || $number == 1) {
            $answer = 'no';
            $this->lastCorrectAnswer = $answer;
            return $answer;
        }

        $start_divisor = 2;

        $answer = "yes";
        for ($i = $number - 1; $i >= $start_divisor; $i--) {
            if ($number % $i == 0) {
                $answer = 'no';
                break;
            }
        }

        $this->lastCorrectAnswer = $answer;
        return $answer;
    }
}
