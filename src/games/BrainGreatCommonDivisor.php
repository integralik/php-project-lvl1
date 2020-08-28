<?php

namespace Brain\Games\Games\BrainGreatCommonDivisor;

use function Brain\Games\GameKernel\flow;

const BRAIN_GCD_MIN_NUMBER = 1;
const BRAIN_GCD_MAX_NUMBER = 100;
const BRAIN_GCD_RULE = 'Find the greatest common divisor of given numbers.';

function gcd($number1, $number2)
{
    $min = min($number1, $number2);
    for ($i = $min; $i > 0; $i--) {
        if ($number1 % $i == 0 && $number2 % $i == 0) {
            return $i;
        }
    }
}

function play()
{
    flow(BRAIN_GCD_RULE, function() {
        $firstNumber = rand(BRAIN_GCD_MIN_NUMBER, BRAIN_GCD_MAX_NUMBER);
        $secondNumber = rand(BRAIN_GCD_MIN_NUMBER, BRAIN_GCD_MAX_NUMBER);

        return [
            'question' => $firstNumber . ' ' . $secondNumber,
            'answer' => gcd($firstNumber, $secondNumber)
        ];
    });
}
