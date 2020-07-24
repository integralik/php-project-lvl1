<?php

namespace Brain\Games;

abstract class AGame
{
    public $lastCorrectAnswer = null;

    abstract public function getWelcomeMessage();
    abstract public function getQuestionInfo();
    abstract public function getCorrectAnswer($questionData);

    public function getLastCorrectAnswer()
    {
        return $this->lastCorrectAnswer;
    }
}
