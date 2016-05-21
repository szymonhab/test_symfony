<?php

namespace GameBundle\Controller;

use GameBundle\Model\GameMap;
use GameBundle\Service\RedisWrapper;
use Predis\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * Class DefaultController
 * @package GameBundle\Controller
 * @Route("/game", service="app.default_controller")
 */
class DefaultController
{
    private $templating;
    private $redisWrapper;

    public function __construct(EngineInterface $templating, RedisWrapper $redisWrapper)
    {
        $this->templating = $templating;
        $this->redisWrapper = $redisWrapper;
    }

    /**
     * @Route("/", name="_index")
     */
    public function indexAction()
    {
        return $this->templating->renderResponse('GameBundle:Default:index.html.twig');
    }

    /**
     * @Route("/play", name="_play")
     */
    public function playAction()
    {
        $map = new GameMap();
        $map->generateRandomMap();
        $this->redisWrapper->setObject('testmap', $map);

        $mapFromRedis = $this->redisWrapper->getObject('testmap');
        var_dump($mapFromRedis);exit;

        return $this->templating->renderResponse('GameBundle:Play:index.html.twig', ['data' => $mapFromRedis]);
    }
}
