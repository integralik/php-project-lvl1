<?php

namespace Brain\Games;

use Brain\Games\Games\BrainEven;

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