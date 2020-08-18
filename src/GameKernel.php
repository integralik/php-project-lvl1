<?php

namespace Brain\Games\GameKernel;

use function Brain\Games\GameCaller\obtainWelcomeMessage;
use function cli\line;
use function cli\prompt;

const TRIES_COUNT = 3;

function welcomeUser($welcomeMessage)
{
    line('Welcome to Brain Games!');
    line($welcomeMessage);
}

function getUsername()
{
    $username = prompt('May I have your name?');
    return $username;
}

function generateData($namespace)
{
    $gameData = [];

    $generateQuestionDataFunc = $namespace . '\\generateQuestionData';
    $generateQuestionTextFunc = $namespace . '\\getQuestionText';
    $generateAnswerTextFunc = $namespace . '\\calculateCorrectAnswer';

    for ($i = 0; $i < TRIES_COUNT; $i++) {
        $questionData = $generateQuestionDataFunc();
        $gameData[] = [
            $questionData,
            $generateQuestionTextFunc($questionData),
            $generateAnswerTextFunc($questionData)
        ];
    }
    return $gameData;
}

function playGame($gameData)
{
    foreach ($gameData as $gameItem) {
        [$questionData, $questionText, $correctAnswer] = $gameItem;

        line('');
        line("Question: " . $questionText);

        $answer = prompt('Your answer');

        if ($answer != $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            return false;
        } else {
            line('Correct!');
        }
    }
    return true;
}

function showEndGameMessage($username, $result)
{
    if ($result) {
        line("Congratulations, {$username}!");
    } else {
        line("Let's try again, {$username}!");
    }
}

function playFlow($rulesText, $gameNamespace)
{
    welcomeUser($rulesText);
    $username = getUsername();
    $gameData = generateData($gameNamespace);
    $result = playGame($gameData);
    showEndGameMessage($username, $result);
}
