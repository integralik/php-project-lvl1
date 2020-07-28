<?php

namespace Brain\Games\Games\BrainEven;

use const Brain\Games\GameKernel\ANSWER_NO;
use const Brain\Games\GameKernel\ANSWER_YES;

const BRAIN_EVEN_MAX_NUMBER = 100;
const BRAIN_EVEN_DIVISOR = 2;

function obtainWelcomeMessage()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function obtainQuestionText($questionData)
{
    $text = $questionData;
    return $text;
}

function generateQuestionInfo()
{
    $number = rand(0, BRAIN_EVEN_MAX_NUMBER);
    return $number;
}

function calculateCorrectAnswer($number)
{
    if ($number % BRAIN_EVEN_DIVISOR === 0) {
        $answer = ANSWER_YES;
    } else {
        $answer = ANSWER_NO;
    }
    return $answer;
}
