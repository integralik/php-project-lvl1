<?php

namespace Brain\Games\GameKernel;

use function Brain\Games\GameCaller\calculateCorrectAnswer;
use function Brain\Games\GameCaller\generateQuestionInfo;
use function Brain\Games\GameCaller\obtainQuestionText;
use function Brain\Games\GetterFromKeyboard\getAnswer;
use function Brain\Games\GetterFromKeyboard\getUsername;
use function Brain\Games\Teller\tellConfirmCorrectAnswer;
use function Brain\Games\Teller\tellCorrectAnswer;
use function Brain\Games\Teller\tellGameIsLost;
use function Brain\Games\Teller\tellGameIsWon;
use function Brain\Games\Teller\tellHello;
use function Brain\Games\Teller\tellQuestion;
use function Brain\Games\Teller\tellWelcomeMessage;

const TRIES_COUNT = 3;
const ANSWER_YES = 'yes';
const ANSWER_NO = 'no';

function tellResponseToAnswer($answer, $correctAnswer)
{
    if ($answer != $correctAnswer) {
        tellCorrectAnswer($answer, $correctAnswer);
    } else {
        tellConfirmCorrectAnswer();
    }
}

function playOnce($gameTitle)
{
    $questionData = generateQuestionInfo($gameTitle);
    $questionText = obtainQuestionText($gameTitle, $questionData);
    tellQuestion($questionText);

    $answer = getAnswer();
    $correctAnswer = calculateCorrectAnswer($gameTitle, $questionData);
    tellResponseToAnswer($answer, $correctAnswer);

    return $answer == $correctAnswer;
}

function playGame($gameTitle)
{
    $isLost = false;
    for ($i = 0; $i < TRIES_COUNT; $i++) {
        $isLost = !playOnce($gameTitle);
        if ($isLost) {
            break;
        }
    }
    return !$isLost;
}

function displayResults($hasWon, $username)
{
    if ($hasWon) {
        tellGameIsWon($username);
    } else {
        tellGameIsLost($username);
    }
}

function runGame($gameTitle)
{
    tellWelcomeMessage($gameTitle);
    $username = getUsername();
    tellHello($username);

    $hasWon = playGame($gameTitle);

    displayResults($hasWon, $username);
}
