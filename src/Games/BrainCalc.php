<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainCalc extends AGame
{
    public const MAX_NUMBER = 20;

    public $lastCorrectAnswer = null;

    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'What is the result of the expression?';
    }

    public function getQuestionInfo()
    {
        $operations = ['+', '-', '*'];

        $firstArg = rand(0, self::MAX_NUMBER);
        $operation = $operations[rand(0, count($operations) - 1)];
        $secondArg = rand(0, self::MAX_NUMBER);

        $text = $firstArg . ' ' . $operation . ' ' . $secondArg;
        $info = [
            $firstArg,
            $operation,
            $secondArg
        ];
        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        [$firstArg, $operation, $secondArg] = $questionData;

        if ($operation == '+') {
            $answer = $firstArg + $secondArg;
        } elseif ($operation == '-') {
            $answer = $firstArg - $secondArg;
        } elseif ($operation == '*') {
            $answer = $firstArg * $secondArg;
        }
        $this->lastCorrectAnswer = $answer;
        return $answer;
    }
}
