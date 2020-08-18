<?php

namespace Brain\Games\Games\BrainCalc;

use function Brain\Games\GameKernel\playFlow;

const BRAIN_CALC_MIN_NUMBER = 0;
const BRAIN_CALC_MAX_NUMBER = 20;
const BRAIN_CALC_OPERATION_ADD = '+';
const BRAIN_CALC_OPERATION_SUBTRACT = '-';
const BRAIN_CALC_OPERATION_MULTIPLY = '*';
const BRAIN_CALC_RULES = 'What is the result of the expression?';

function generateQuestionData()
{
    $operations = [
        BRAIN_CALC_OPERATION_ADD,
        BRAIN_CALC_OPERATION_SUBTRACT,
        BRAIN_CALC_OPERATION_MULTIPLY
    ];

    $firstArg = rand(BRAIN_CALC_MIN_NUMBER, BRAIN_CALC_MAX_NUMBER);
    $operation = $operations[rand(0, count($operations) - 1)];
    $secondArg = rand(BRAIN_CALC_MIN_NUMBER, BRAIN_CALC_MAX_NUMBER);

    $info = [
        $firstArg,
        $operation,
        $secondArg
    ];
    return $info;
}

function getQuestionText($questionData)
{
    [$firstArg, $operation, $secondArg] = $questionData;
    $text = $firstArg . ' ' . $operation . ' ' . $secondArg;
    return $text;
}

function calculateCorrectAnswer($questionData)
{
    [$firstArg, $operation, $secondArg] = $questionData;

    switch ($operation) {
        case BRAIN_CALC_OPERATION_ADD:
            $answer = $firstArg + $secondArg;
            break;
        case BRAIN_CALC_OPERATION_SUBTRACT:
            $answer = $firstArg - $secondArg;
            break;
        case BRAIN_CALC_OPERATION_MULTIPLY:
            $answer = $firstArg * $secondArg;
            break;
    }
    return $answer;
}

function play()
{
    playFlow(BRAIN_CALC_RULES, __NAMESPACE__);
}
