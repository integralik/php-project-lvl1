<?php

namespace Brain\Games\Games\BrainEven;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_EVEN_MIN_NUMBER = 0;
const BRAIN_EVEN_MAX_NUMBER = 100;
const BRAIN_EVEN_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function generateDataset()
{
    $number = rand(BRAIN_EVEN_MIN_NUMBER, BRAIN_EVEN_MAX_NUMBER);
    return [
        'question' => $number,
        'answer' => isEven($number) ? 'yes' : 'no'
    ];
}

function play()
{
    playFlow(BRAIN_EVEN_RULES, __NAMESPACE__ . '\\generateDataset');
}
