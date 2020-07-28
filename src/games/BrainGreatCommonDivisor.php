<?php

namespace Brain\Games\Games\BrainGreatCommonDivisor;

const BRAIN_GCD_MAX_NUMBER = 100;

function obtainWelcomeMessage()
{
    return 'Find the greatest common divisor of given numbers.';
}

function obtainQuestionText($questionData)
{
    [$firstArg, $secondArg] = $questionData;
    $text = $firstArg . ' ' . $secondArg;
    return $text;
}

function generateQuestionInfo()
{
    $firstArg = rand(0, BRAIN_GCD_MAX_NUMBER);
    $secondArg = rand(0, BRAIN_GCD_MAX_NUMBER);

    $info = [
        $firstArg,
        $secondArg
    ];
    return $info;
}

function calculateCorrectAnswer($questionData)
{
    [$firstArg, $secondArg] = $questionData;

    $min = min($firstArg, $secondArg);
    for ($i = $min; $i > 0; $i--) {
        if ($firstArg % $i == 0 && $secondArg % $i == 0) {
            $answer = $i;
            break;
        }
    }

    return $answer;
}
