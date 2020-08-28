<?php

namespace Brain\Games\Games\BrainProgression;

use function Brain\Games\GameKernel\flow;

const BRAIN_PROGRESSION_MIN_START_NUMBER = 0;
const BRAIN_PROGRESSION_MAX_START_NUMBER = 100;
const BRAIN_PROGRESSION_MIN_STEP = -10;
const BRAIN_PROGRESSION_MAX_STEP = 10;
const BRAIN_PROGRESSION_COUNT = 10;
const BRAIN_PROGRESSION_RULE = 'What number is missing in the progression?';

function getQuestion($firstElement, $step, $position)
{
    $elements = [];
    for ($i = 0; $i < BRAIN_PROGRESSION_COUNT; $i++) {
        if ($i != $position) {
            $elements[] = $firstElement + $i * $step;
        } else {
            $elements[] = '..';
        }
    }

    return implode(' ', $elements);
}

function play()
{
    flow(BRAIN_PROGRESSION_RULE, function () {
        $firstElement = rand(BRAIN_PROGRESSION_MIN_START_NUMBER, BRAIN_PROGRESSION_MAX_START_NUMBER);
        $step = rand(BRAIN_PROGRESSION_MIN_STEP, BRAIN_PROGRESSION_MAX_STEP);
        $position = rand(0, BRAIN_PROGRESSION_COUNT - 1);

        return [
            'question' => getQuestion($firstElement, $step, $position),
            'answer' => $firstElement + $step * $position
        ];
    });
}
