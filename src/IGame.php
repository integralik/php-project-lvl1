<?php


namespace Brain\Games;

interface IGame
{
    public function getWelcomeMessage();
    public function getQuestionText();
    public function checkAnswer($questionData, $answer);
}