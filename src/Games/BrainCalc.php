<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainCalc extends AGame
{
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
        $max_number = 100;
        $operations = ['+', '-', '*'];

        $firstArg = rand(0, $max_number);
        $operation = $operations[rand(0, count($operations) - 1)];
        $secondArg = rand(0, $max_number);

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
        $firstArg = $questionData[0];
        $operation = $questionData[1];
        $secondArg = $questionData[2];

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
