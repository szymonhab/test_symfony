<?php

namespace GameBundle\Controller;

use GameBundle\Service\MapModule\MapManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class MapController
 * @package GameBundle\Controller
 * @Route("/map", service="app.map_controller")
 */
class MapController
{
    private $mapManager;

    public function __construct(MapManager $mapManager)
    {
        $this->mapManager = $mapManager;
    }

    /**
     * @return JsonResponse
     * @Route("/get")
     * @Method("GET")
     */
    public function getMap()
    {
        $mapFromRedis = $this->mapManager->getCurrentMap();

        return new JsonResponse(['map' => $mapFromRedis->getArrayRepresentation()]);
    }
}