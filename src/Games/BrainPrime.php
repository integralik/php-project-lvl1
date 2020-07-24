<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainPrime extends AGame
{
    public const MAX_NUMBER = 100;

    private const START_DIVISOR = 2;

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
            $answer = AGame::ANSWER_NO;
            $this->lastCorrectAnswer = $answer;
            return $answer;
        }

        $answer = AGame::ANSWER_YES;
        for ($i = $number - 1; $i >= self::START_DIVISOR; $i--) {
            if ($number % $i == 0) {
                $answer = AGame::ANSWER_NO;
                break;
            }
        }

        $this->setLastCorrectAnswer($answer);
        return $answer;
    }
}
