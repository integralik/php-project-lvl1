<?php

namespace Brain\Games\Games\BrainCalc;

const BRAIN_CALC_MAX_NUMBER = 20;
const BRAIN_CALC_OPERATION_ADD = '+';
const BRAIN_CALC_OPERATION_SUBTRACT = '-';
const BRAIN_CALC_OPERATION_MULTIPLY = '*';

function obtainWelcomeMessage()
{
    return 'What is the result of the expression?';
}

function obtainQuestionText($questionData)
{
    [$firstArg, $operation, $secondArg] = $questionData;
    $text = $firstArg . ' ' . $operation . ' ' . $secondArg;
    return $text;
}

function generateQuestionInfo()
{
    $operations = [
        BRAIN_CALC_OPERATION_ADD,
        BRAIN_CALC_OPERATION_SUBTRACT,
        BRAIN_CALC_OPERATION_MULTIPLY
    ];

    $firstArg = rand(0, BRAIN_CALC_MAX_NUMBER);
    $operation = $operations[rand(0, count($operations) - 1)];
    $secondArg = rand(0, BRAIN_CALC_MAX_NUMBER);

    $info = [
        $firstArg,
        $operation,
        $secondArg
    ];
    return $info;
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
