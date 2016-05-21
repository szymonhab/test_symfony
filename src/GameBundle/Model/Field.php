<?php

namespace GameBundle\Model;

class Field
{
    private $terrainType;
    private $buildingType;

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
     * @return mixed
     */
    public function getTerrainType()
    {
        return $this->terrainType;
    }

    /**
     * @param mixed $terrainType
     */
    public function setTerrainType($terrainType)
    {
        $this->terrainType = $terrainType;
    }

}