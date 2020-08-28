<?php

namespace Brain\Games\GameKernel;

use function cli\line;
use function cli\prompt;

const TRIES_COUNT = 3;

function flow($rule, callable $generateData)
{
    line('Welcome to Brain Games!');
    line($rule);

    $username = prompt('May I have your name?');

    $gameResult = true;
    for ($i = 0; $i < TRIES_COUNT; $i++) {
        ['question' => $questionText, 'answer' => $correctAnswer] = $generateData();

        line('');
        line("Question: " . $questionText);

        $answer = prompt('Your answer');

        if ($answer != $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$username}!");
            return false;
        } else {
            line('Correct!');
        }
    }

    line("Congratulations, {$username}!");
    return true;
}
