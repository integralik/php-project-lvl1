<?php

namespace Brain\Games\GameCaller;

function getNamespace($gameTitle)
{
    switch ($gameTitle) {
        case 'brain-calc':
            $namespace = "\\Brain\\Games\\Games\\BrainCalc\\";
            break;
        case 'brain-even':
            $namespace = "\\Brain\\Games\\Games\\BrainEven\\";
            break;
        case 'brain-gcd':
            $namespace = "\\Brain\\Games\\Games\\BrainGreatCommonDivisor\\";
            break;
        case 'brain-prime':
            $namespace = "\\Brain\\Games\\Games\\BrainPrime\\";
            break;
        case 'brain-progression':
            $namespace = "\\Brain\\Games\\Games\\BrainProgression\\";
            break;
    }
    return $namespace;
}

function obtainWelcomeMessage($gameTitle)
{
    $namespace = getNamespace($gameTitle);
    $functionName = $namespace . 'obtainWelcomeMessage';
    return $functionName();
}

function generateQuestionInfo($gameTitle)
{
    $namespace = getNamespace($gameTitle);
    $functionName = $namespace . 'generateQuestionInfo';
    return $functionName();
}

function obtainQuestionText($gameTitle, $questionData)
{
    $namespace = getNamespace($gameTitle);
    $functionName = $namespace . 'obtainQuestionText';
    return $functionName($questionData);
}

function calculateCorrectAnswer($gameTitle, $questionData)
{
    $namespace = getNamespace($gameTitle);
    $functionName = $namespace . 'calculateCorrectAnswer';
    return $functionName($questionData);
}
