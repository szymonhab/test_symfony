<?php

namespace GameBundle\Model;

/**
 * Class GameMap represents game map data structure
 */
class GameMap
{
    /**
     * @var array Internal array is x-axis, External y-axis
     */
    private $fields = [[]];

    public function generateRandomMap()
    {
        $size = 8;

        for ($x = 0; $x < $size; $x++) {
            for ($y = 0; $y < $size; $y++) {
                $field = new Field();
                $field->setTerrainType(mt_rand(0, 5));
                $this->pushField($x, $y, $field);
            }
        }
    }

    private function pushField($x, $y, $field)
    {
        $this->fields[$y][$x] = $field;
    }
}