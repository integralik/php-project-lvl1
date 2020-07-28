<?php

namespace Brain\Games\Games\BrainProgression;

const BRAIN_PROGRESSION_MAX_NUMBER = 100;
const BRAIN_PROGRESSION_MAX_STEP = 10;
const BRAIN_PROGRESSION_COUNT = 10;

function obtainWelcomeMessage()
{
    return 'What number is missing in the progression?';
}

function obtainQuestionText($questionData)
{
    [$firstElement, $step, $position] = $questionData;

    $arMembers = [];
    for ($i = 0; $i < BRAIN_PROGRESSION_COUNT; $i++) {
        if ($i != $position) {
            $arMembers[] = $firstElement + $i * $step;
        } else {
            $arMembers[] = '..';
        }
    }

    return implode(' ', $arMembers);
}

function generateQuestionInfo()
{
    $firstElement = rand(0, BRAIN_PROGRESSION_MAX_NUMBER);
    $step = rand(- BRAIN_PROGRESSION_MAX_STEP, BRAIN_PROGRESSION_MAX_STEP);
    $position = rand(0, BRAIN_PROGRESSION_COUNT - 1);

    $info = [
        $firstElement,
        $step,
        $position
    ];

    return $info;
}

function calculateCorrectAnswer($questionData)
{
    [$firstElement, $step, $position] = $questionData;
    $answer = $firstElement + $step * $position;
    return $answer;
}
