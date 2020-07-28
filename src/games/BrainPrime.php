<?php

namespace Brain\Games\Games\BrainPrime;

use Brain\Games\AGame;

use const Brain\Games\GameKernel\ANSWER_NO;
use const Brain\Games\GameKernel\ANSWER_YES;

const BRAIN_PRIME_MAX_NUMBER = 100;
const BRAIN_PRIME_START_DIVISOR = 2;

function obtainWelcomeMessage()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function obtainQuestionText($questionData)
{
    $text = $questionData;
    return $text;
}

function generateQuestionInfo()
{
    $number = rand(0, BRAIN_PRIME_MAX_NUMBER);
    return $number;
}

function calculateCorrectAnswer($number)
{
    if ($number <= 1) {
        return ANSWER_NO;
    }

    $answer = ANSWER_YES;
    for ($i = $number - 1; $i >= BRAIN_PRIME_START_DIVISOR; $i--) {
        if ($number % $i == 0) {
            $answer = ANSWER_NO;
        }
    }

    return $answer;
}
