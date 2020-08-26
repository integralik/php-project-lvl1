# BrainGames project

<a href="https://codeclimate.com/github/integralik/php-project-lvl1/maintainability"><img src="https://api.codeclimate.com/v1/badges/9d1031da30e7eb30c490/maintainability" /></a>

<img src="https://github.com/integralik/php-project-lvl1/workflows/PHP%20Project%20Level1%20CI/badge.svg">

With this project you can play BrainGames on your computer. When you start the game and enter your name, you see the rules of the game. You have three tries. If you are incorrect, you lose. If you are correct three times in a row, you win.

To install this project on your computer, you need Linux or MacOS. Also you need PHP 7 and Composer installed.

## Setup

```sh
$ composer global require integralik/braingames.localhost
```

The global composer directory for your user has to be added to the PATH. For example:

```sh
$ export PATH="/home/username/.config/composer/:$PATH"
```

After that restart your session.

## BrainEven game

To play the game, enter

```sh
$ brain-even
```

You have to decide whether the number is even (answer "yes") or not (answer "no"). Any other answer will also be incorrect.

<a href="https://asciinema.org/a/49omeD6MXsIxcqMG56qalo4yG" target="_blank"><img src="https://asciinema.org/a/49omeD6MXsIxcqMG56qalo4yG.svg" /></a>

## BrainCalc game

You have to calculate the result of the mathematic expressions.

<a href="https://asciinema.org/a/q6WOdWBCblaASHFYQUw1Xxh6i" target="_blank"><img src="https://asciinema.org/a/q6WOdWBCblaASHFYQUw1Xxh6i.svg" /></a>

## BrainGCD game

You have to calculate the great common divisor of two numbers.

<a href="https://asciinema.org/a/3rDmqr7OnbRNJbNl4npiZUbJx" target="_blank"><img src="https://asciinema.org/a/3rDmqr7OnbRNJbNl4npiZUbJx.svg" /></a>

## BrainProgression game

You have to fill the omission in arithmetic progression.

<a href="https://asciinema.org/a/4vyq83aDlgRTwWx7NAFsnWKvl" target="_blank"><img src="https://asciinema.org/a/4vyq83aDlgRTwWx7NAFsnWKvl.svg" /></a>

## BrainPrime game

You have to decide whether the number is prime or not.

<a href="https://asciinema.org/a/lWbz3IO8KWlntOl8ID4DkZN0q" target="_blank"><img src="https://asciinema.org/a/lWbz3IO8KWlntOl8ID4DkZN0q.svg" /></a>
