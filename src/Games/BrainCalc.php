<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainCalc extends AGame
{
    public const MAX_NUMBER = 20;

    protected const OPERATION_ADD = '+';
    protected const OPERATION_SUBTRACT = '-';
    protected const OPERATION_MULTIPLY = '*';

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
        $operations = [
            self::OPERATION_ADD,
            self::OPERATION_SUBTRACT,
            self::OPERATION_MULTIPLY
        ];

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

        switch ($operation) {
            case self::OPERATION_ADD:
                $answer = $firstArg + $secondArg;
                break;
            case self::OPERATION_SUBTRACT:
                $answer = $firstArg - $secondArg;
                break;
            case self::OPERATION_MULTIPLY:
                $answer = $firstArg * $secondArg;
                break;
        }

        $this->setLastCorrectAnswer($answer);
        return $answer;
    }
}
