<?php

namespace Brain\Games\GameCaller;

function getNamespace($gameTitle)
{
    if ($gameTitle == 'brain-gcd') {
        return "\\Brain\\Games\\Games\\BrainGreatCommonDivisor\\";
    }
    $gameTitleCamelized = \Funct\Strings\camelize($gameTitle);
    $namespace = "\\Brain\\Games\\Games\\{$gameTitleCamelized}\\";
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
