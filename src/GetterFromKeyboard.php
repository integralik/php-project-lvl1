<?php

namespace Brain\Games\GetterFromKeyboard;

use function cli\prompt;

function getUsername()
{
    $username = prompt('May I have your name?');
    return $username;
}

function getAnswer()
{
    $answer = prompt('Your answer');
    return $answer;
}
