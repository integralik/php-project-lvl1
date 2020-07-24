<?php

namespace Brain\Games;

use Brain\Games\Games\BrainCalc;
use Brain\Games\Games\BrainEven;
use Brain\Games\Games\BrainGreatCommonDivisor;
use Brain\Games\Games\BrainPrime;
use Brain\Games\Games\BrainProgression;

class GameStarter
{
    public static function getGame($gameTitle)
    {
        switch ($gameTitle) {
            case 'brain-calc':
                $game = new BrainCalc();
                break;
            case 'brain-even':
                $game = new BrainEven();
                break;
            case 'brain-gcd':
                $game = new BrainGreatCommonDivisor();
                break;
            case 'brain-prime':
                $game = new BrainPrime();
                break;
            case 'brain-progression':
                $game = new BrainProgression();
                break;
        }
        return $game;
    }

    public static function run($gameTitle)
    {
        $currentGame = self::getGame($gameTitle);
        $gameWrapper = new GameCore($currentGame);
        $gameWrapper->play();
    }
}
