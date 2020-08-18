<?php

namespace Brain\Games\Games\BrainGreatCommonDivisor;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_GCD_MIN_NUMBER = 1;
const BRAIN_GCD_MAX_NUMBER = 100;
const BRAIN_GCD_RULES = 'Find the greatest common divisor of given numbers.';

function gcd($number1, $number2)
{
    $min = min($number1, $number2);
    for ($i = $min; $i > 0; $i--) {
        if ($number1 % $i == 0 && $number2 % $i == 0) {
            $answer = $i;
            break;
        }
    }

    return $answer;
}

function generateQuestionData()
{
    $firstArg = rand(BRAIN_GCD_MIN_NUMBER, BRAIN_GCD_MAX_NUMBER);
    $secondArg = rand(BRAIN_GCD_MIN_NUMBER, BRAIN_GCD_MAX_NUMBER);

    $info = [
        $firstArg,
        $secondArg
    ];
    return $info;
}

function getQuestionText($questionData)
{
    [$firstArg, $secondArg] = $questionData;
    $text = $firstArg . ' ' . $secondArg;
    return $text;
}

function calculateCorrectAnswer($questionData)
{
    [$firstArg, $secondArg] = $questionData;

    return gcd($firstArg, $secondArg);
}

function play()
{
    playFlow(BRAIN_GCD_RULES, __NAMESPACE__);
}
