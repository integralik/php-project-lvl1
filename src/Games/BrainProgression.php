<?php

namespace Brain\Games\Games;

use Brain\Games\AGame;

class BrainProgression extends AGame
{
    public const MAX_NUMBER = 100;
    public const MAX_STEP = 10;
    public const PROGRESSION_COUNT = 10;


    public $lastCorrectAnswer = null;

    public function __construct()
    {
    }

    public function getWelcomeMessage()
    {
        return 'What number is missing in the progression?';
    }

    private function getQuestionText($firstElement, $step, $position)
    {
        $arMembers = [];
        for ($i = 0; $i < self::PROGRESSION_COUNT; $i++) {
            if ($i != $position) {
                $arMembers[] = $firstElement + $i * $step;
            } else {
                $arMembers[] = '..';
            }
        }

        return implode(' ', $arMembers);
    }

    public function getQuestionInfo()
    {
        $firstElement = rand(0, self::MAX_NUMBER);
        $step = rand(- self::MAX_STEP, self::MAX_STEP);
        $position = rand(0, self::PROGRESSION_COUNT - 1);

        $text = $this->getQuestionText($firstElement, $step, $position);
        $info = [
            $firstElement,
            $step,
            $position
        ];

        return [$text, $info];
    }

    public function getCorrectAnswer($questionData)
    {
        [$firstElement, $step, $position] = $questionData;
        $answer = $firstElement + $step * $position;
        $this->setLastCorrectAnswer($answer);
        return $answer;
    }
}
