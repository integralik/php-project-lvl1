<?php

namespace Brain\Games\Games\BrainCalc;

use function Brain\Games\GameKernel\flow;

const BRAIN_CALC_MIN_NUMBER = 0;
const BRAIN_CALC_MAX_NUMBER = 20;
const BRAIN_CALC_OPERATIONS = [
    'add' => '+',
    'subtract' => '-',
    'multiply' => '*'
];
const BRAIN_CALC_RULE = 'What is the result of the expression?';

function calculateCorrectAnswer($firstNumber, $operation, $secondNumber)
{
    switch ($operation) {
        case BRAIN_CALC_OPERATIONS['add']:
            $answer = $firstNumber + $secondNumber;
            break;
        case BRAIN_CALC_OPERATIONS['subtract']:
            $answer = $firstNumber - $secondNumber;
            break;
        case BRAIN_CALC_OPERATIONS['multiply']:
            $answer = $firstNumber * $secondNumber;
            break;
    }
    return $answer;
}

function play()
{
    flow(BRAIN_CALC_RULE, function() {
        $operations = array_values(BRAIN_CALC_OPERATIONS);

        $firstNumber = rand(BRAIN_CALC_MIN_NUMBER, BRAIN_CALC_MAX_NUMBER);
        $operation = $operations[array_rand($operations)];
        $secondNumber = rand(BRAIN_CALC_MIN_NUMBER, BRAIN_CALC_MAX_NUMBER);

        return [
            'question' => $firstNumber . ' ' . $operation . ' ' . $secondNumber,
            'answer' => calculateCorrectAnswer($firstNumber, $operation, $secondNumber)
        ];
    });
}
