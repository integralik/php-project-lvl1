<?php

namespace Brain\Games;

use Brain\Games\Games\BrainCalc;
use Brain\Games\Games\BrainEven;
use Brain\Games\Games\BrainGreatCommonDivisor;
use Brain\Games\Games\BrainProgression;

class GameStarter
{
    public static function getGame($gameTitle)
    {
        switch ($gameTitle) {
            case 'brain-even':
                $game = new BrainEven();
                break;
            case 'brain-calc':
                $game = new BrainCalc();
                break;
            case 'brain-gcd':
                $game = new BrainGreatCommonDivisor();
                break;
            case 'brain-progression':
                $game = new BrainProgression();
                break;
        }
        return $game;
    }

    public static function run($gameTitle)
    {
        $game = self::getGame($gameTitle);
        $obGame = new GameCore($game);
        $obGame->play();
    }
}
