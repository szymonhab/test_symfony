<?php

namespace GameBundle\Model;


class GameMap
{
    /** @var $fields Internal array is X-axis, external Y-axis */
    protected $fields = [[]];

    public function pushField($x, $y, Field $field)
    {
        $this->fields[$y][$x] = $field;
    }

    public function getArrayRepresentation()
    {
        $array = [[]];
        foreach ($this->fields as $y => $row) {
            foreach ($row as $x => $field) {
                /** @var Field $field */
                $array[$y][$x] = [
                    'type' => $field->getTerrainType(),
                    'img' => $field->getTerrainImgURL()
                ];
            }
        }

        return $array;
    }
}