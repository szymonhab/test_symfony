<?php

namespace GameBundle\Service\MapModule;
use GameBundle\Model\Field;
use GameBundle\Model\GameMap;

/**
 * Class GameMapBuilder builds round hex game map data structure
 */
class GameMapBuilder
{
    const SIZE_X = 5;
    const SIZE_Y = 13;

    private $gameMap;

    public function __construct()
    {
        $this->gameMap = new GameMap();
    }

    public function getGameMap()
    {
        return $this->gameMap;
    }

    public function generateRandomMap()
    {
        for ($y = 0; $y < self::SIZE_Y; $y++) {
            for ($x = 0; $x < self::SIZE_X; $x++) {
                $this->setRandomField($x, $y);
            }
        }
    }

    private function setRandomField($x, $y)
    {
        if ($this->isInRoundMap($x, $y)) {
            $field = new Field();
            $field->setTerrainType(mt_rand(0, 4));
            $this->gameMap->pushField($x, $y, $field);
        }
    }

    private function isInRoundMap($x, $y)
    {
        // @TODO make it expandable
        switch ($this->distanceFromYBoundaries($y)) {
            case 0:
                return ($x == 2);
            case 1:
                return ($x >= 1 && $x <= 2);
            case 2:
                return ($x >= 1 && $x <= 3);
            case 3:
                return ($x >= 0 && $x <= 3);
        }

        if ($y%2 == 0) {
            return true;
        } else {
            return ($x >= 0 && $x < (self::SIZE_X - 1));
        }
    }

    private function distanceFromYBoundaries($y)
    {
        $distanceBot = self::SIZE_Y - ($y + 1);

        if ($y < $distanceBot) {
            return $y;
        }
        return $distanceBot;
    }
}