<?php

namespace Brain\Games\GameKernel;

use function cli\line;
use function cli\prompt;

const TRIES_COUNT = 3;

function playFlow($rulesText, $generateDataPairFunc)
{
    line('Welcome to Brain Games!');
    line($rulesText);

    $username = prompt('May I have your name?');

    $gameResult = true;
    for ($i = 0; $i < TRIES_COUNT; $i++) {
        ['question' => $questionText, 'answer' => $correctAnswer] = $generateDataPairFunc();

        line('');
        line("Question: " . $questionText);

        $answer = prompt('Your answer');

        if ($answer != $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            $gameResult = false;
            break;
        } else {
            line('Correct!');
        }
    }

    line($gameResult ? "Congratulations, {$username}!" : "Let's try again, {$username}!");
}
