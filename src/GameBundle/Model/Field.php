<?php

namespace GameBundle\Model;

class Field
{
    private $terrainType;
    private $buildingType;

    private $mapTerrainName = [
        0 => 'plains',
        1 => 'hills',
        2 => 'forest',
        3 => 'highmountains',
        4 => 'swamps'
    ];
    const IMG_FOLDER = 'img/';

    /**
     * @return mixed
     */
    public function getBuildingType()
    {
        return $this->buildingType;
    }

    /**
     * @param mixed $buildingType
     */
    public function setBuildingType($buildingType)
    {
        $this->buildingType = $buildingType;
    }

    /**
     * @return int
     */
    public function getTerrainType()
    {
        return $this->terrainType;
    }

    /**
     * @param int $terrainType
     */
    public function setTerrainType($terrainType)
    {
        $this->terrainType = (int) $terrainType;
    }

    public function getTerrainImgURL()
    {
        $terrainName = $this->mapTerrainName[$this->getTerrainType()];

        return self::IMG_FOLDER . $terrainName . '.png';
    }
}