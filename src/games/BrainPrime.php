<?php

namespace Brain\Games\Games\BrainPrime;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_PRIME_MIN_NUMBER = 1;
const BRAIN_PRIME_MAX_NUMBER = 100;
const BRAIN_PRIME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = $number - 1; $i > 1; $i--) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function generateDataset()
{
    $number = rand(BRAIN_PRIME_MIN_NUMBER, BRAIN_PRIME_MAX_NUMBER);
    return [
        'question' => $number,
        'answer' => isPrime($number) ? 'yes' : 'no'
    ];
}

function play()
{
    playFlow(BRAIN_PRIME_RULES, __NAMESPACE__ . '\\generateDataset');
}
