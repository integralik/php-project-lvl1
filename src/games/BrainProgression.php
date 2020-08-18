<?php

namespace Brain\Games\Games\BrainProgression;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_PROGRESSION_MIN_START_NUMBER = 0;
const BRAIN_PROGRESSION_MAX_START_NUMBER = 100;
const BRAIN_PROGRESSION_MAX_STEP = 10;
const BRAIN_PROGRESSION_COUNT = 10;
const BRAIN_PROGRESSION_RULES = 'What number is missing in the progression?';

function generateQuestionData()
{
    $firstElement = rand(BRAIN_PROGRESSION_MIN_START_NUMBER, BRAIN_PROGRESSION_MAX_START_NUMBER);
    $step = rand(- BRAIN_PROGRESSION_MAX_STEP, BRAIN_PROGRESSION_MAX_STEP);
    $position = rand(0, BRAIN_PROGRESSION_COUNT - 1);

    $info = [
        $firstElement,
        $step,
        $position
    ];

    return $info;
}

function getQuestionText($questionData)
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

function calculateCorrectAnswer($questionData)
{
    [$firstElement, $step, $position] = $questionData;
    $answer = $firstElement + $step * $position;
    return $answer;
}

function play()
{
    playFlow(BRAIN_PROGRESSION_RULES, __NAMESPACE__);
}
