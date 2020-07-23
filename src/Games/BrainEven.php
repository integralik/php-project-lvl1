<?php

namespace Brain\Games\Games;

use function cli\line;
use function cli\prompt;

class BrainEven
{
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    private static function welcome()
    {
        line('Welcome to Brain Games!');
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line('');
    }
    
    private static function getName()
    {
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        return $name;
    }
    
    public function getQuestionText()
    {
        $max_number = 100;
        return rand(0, $max_number);
    }
    
    public function checkAnswer($number, $answer)
    {
        if ($number % 2 === 0 && $answer === 'yes') {
            return true;
        }
        if ($number % 2 === 1 && $answer === 'no') {
            return true;
        }
        return false;
    }
    
    public function giveTry()
    {
        line('');
        $int = $this->getQuestionText();
        line("Question: " . $int);
        
        $answer = prompt('Your answer');
        
        return $this->checkAnswer($int, $answer);
    }
    
    public function winGame()
    {
        line("Congratulations, {$this->name}!");
    }
    
    public function loseGame()
    {
        line("Let's try again, {$this->name}!");
    }
    
    public function play()
    {
        $triesAmount = 3;
        
        $isLost = false;
        for ($i = 0; $i < $triesAmount; $i++) {
            if (!$this->giveTry()) {
                $this->loseGame();
                $isLost = true;
                break;
            }
        }
        if (!$isLost) {
            $this->winGame();
        }
    }
    
    public static function run()
    {
        self::welcome();
        $name = self::getName();
        $obGame = new self($name);
        $obGame->play();
    }
}
