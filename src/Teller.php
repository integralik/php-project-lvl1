<?php

namespace Brain\Games\Teller;

use function Brain\Games\GameCaller\obtainWelcomeMessage;
use function cli\line;

function tellWelcomeMessage($gameTitle)
{
    line('Welcome to Brain Games!');
    line(obtainWelcomeMessage($gameTitle));
    line('');
}


function tellHello($username)
{
    line("Hello, %s!", $username);
}

function tellGameIsWon($username)
{
    line("Congratulations, {$username}!");
}

function tellGameIsLost($username)
{
    line("Let's try again, {$username}!");
}

function tellQuestion($questionText)
{
    line('');
    line("Question: " . $questionText);
}

function tellCorrectAnswer($answer, $correctAnswer)
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
}

function tellConfirmCorrectAnswer()
{
    line('Correct!');
}
