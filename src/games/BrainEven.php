<?php

namespace Brain\Games\Games\BrainEven;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_EVEN_MIN_NUMBER = 0;
const BRAIN_EVEN_MAX_NUMBER = 100;
const BRAIN_EVEN_DIVISOR = 2;
const BRAIN_EVEN_ANSWER_YES = 'yes';
const BRAIN_EVEN_ANSWER_NO = 'no';

function isEven($number)
{
    return $number % BRAIN_EVEN_DIVISOR === 0;
}

function generateQuestionData()
{
    $number = rand(BRAIN_EVEN_MIN_NUMBER, BRAIN_EVEN_MAX_NUMBER);
    return $number;
}

function getQuestionText($questionData)
{
    $text = $questionData;
    return $text;
}

function calculateCorrectAnswer($number)
{
    if (isEven($number)) {
        $answer = BRAIN_EVEN_ANSWER_YES;
    } else {
        $answer = BRAIN_EVEN_ANSWER_NO;
    }
    return $answer;
}

function play()
{
    $rules = 'Answer "' .  BRAIN_EVEN_ANSWER_YES . '" if the number is even, otherwise answer "' .
        BRAIN_EVEN_ANSWER_NO . '".';
    playFlow($rules, __NAMESPACE__);
}
