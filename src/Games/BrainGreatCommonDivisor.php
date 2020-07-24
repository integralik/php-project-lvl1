<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainGreatCommonDivisor extends AGame
{
    public const MAX_NUMBER = 100;

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

        $firstArg = rand(0, self::MAX_NUMBER);
        $secondArg = rand(0, self::MAX_NUMBER);

        $text = $firstArg . ' ' . $secondArg;
        $info = [
            $firstArg,
            $secondArg
        ];
        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        [$firstArg, $secondArg] = $questionData;

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
