<?php

namespace Brain\Games\Games\BrainPrime;

use function Brain\Games\GameKernel\flow;

const BRAIN_PRIME_MIN_NUMBER = 1;
const BRAIN_PRIME_MAX_NUMBER = 100;
const BRAIN_PRIME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    /* Calculating the value of this function for the first 10 000 natural numbers
       using square root of N lasts on average 0.009 sec
       using N / 2 - lasts on average 0.216 sec
       if there is a divisor that is more than sqrt(N), then there also is a divisor
       of the same number that is less than sqrt(N)
    */

    for ($i = round(sqrt($number)); $i > 1; $i--) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

function play()
{
    flow(BRAIN_PRIME_RULE, function () {
        $number = rand(BRAIN_PRIME_MIN_NUMBER, BRAIN_PRIME_MAX_NUMBER);
        return [
            'question' => $number,
            'answer' => isPrime($number) ? 'yes' : 'no'
        ];
    });
}
