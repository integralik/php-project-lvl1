<?php

namespace Brain\Games;

abstract class AGame
{
    protected const ANSWER_YES = 'yes';
    protected const ANSWER_NO = 'no';

    public $lastCorrectAnswer = null;

    abstract public function getWelcomeMessage();
    abstract public function getQuestionInfo();
    abstract public function getCorrectAnswer($questionData);

    public function getLastCorrectAnswer()
    {
        return $this->lastCorrectAnswer;
    }

    protected function setLastCorrectAnswer($answer)
    {
        $this->lastCorrectAnswer = $answer;
    }
}
