<?php

namespace Brain\Games\Games\BrainPrime;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_PRIME_MIN_NUMBER = 1;
const BRAIN_PRIME_MAX_NUMBER = 100;
const BRAIN_PRIME_START_DIVISOR = 2;
const BRAIN_PRIME_ANSWER_YES = 'yes';
const BRAIN_PRIME_ANSWER_NO = 'no';

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = $number - 1; $i >= BRAIN_PRIME_START_DIVISOR; $i--) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function generateQuestionData()
{
    $number = rand(BRAIN_PRIME_MIN_NUMBER, BRAIN_PRIME_MAX_NUMBER);
    return $number;
}

function getQuestionText($questionData)
{
    $text = $questionData;
    return $text;
}

function calculateCorrectAnswer($number)
{
    if (isPrime($number)) {
        return BRAIN_PRIME_ANSWER_YES;
    } else {
        return BRAIN_PRIME_ANSWER_NO;
    }
}

function play()
{
    $rules = 'Answer "' . BRAIN_PRIME_ANSWER_YES . '" if given number is prime. Otherwise answer "' . BRAIN_PRIME_ANSWER_NO . '".';
    playFlow($rules, __NAMESPACE__);
}

