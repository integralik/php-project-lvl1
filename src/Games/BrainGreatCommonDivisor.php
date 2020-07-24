<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainGreatCommonDivisor extends AGame
{
    public $lastCorrectAnswer = null;

    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    public function getQuestionInfo()
    {
        $max_number = 100;

        $firstArg = rand(0, $max_number);
        $secondArg = rand(0, $max_number);

        $text = $firstArg . ' ' . $secondArg;
        $info = [
            $firstArg,
            $secondArg
        ];
        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        $firstArg = $questionData[0];
        $secondArg = $questionData[1];

        $min = min($firstArg, $secondArg);
        for ($i = $min; $i > 0; $i--) {
            if ($firstArg % $i == 0 && $secondArg % $i == 0) {
                $answer = $i;
                break;
            }
        }

        $this->lastCorrectAnswer = $answer;
        return $answer;
    }
}
