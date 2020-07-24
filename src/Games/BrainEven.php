<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainEven extends AGame
{
    public const MAX_NUMBER = 100;

    private const DIVISOR = 2;

    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getQuestionInfo()
    {
        $info = rand(0, self::MAX_NUMBER);
        $text = $info;
        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        $number = $questionData;
        if ($number % self::DIVISOR === 0) {
            $answer = AGame::ANSWER_YES;
        } else {
            $answer = AGame::ANSWER_NO;
        }
        $this->lastCorrectAnswer = $answer;
        return $answer;
    }
}
