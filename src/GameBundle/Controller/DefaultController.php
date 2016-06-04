<?php

namespace GameBundle\Controller;

use GameBundle\Service\MapModule\MapManager;
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
    private $mapManager;

    public function __construct(EngineInterface $templating, MapManager $mapManager)
    {
        $this->templating = $templating;
        $this->mapManager = $mapManager;
    }

    /**
     * @Route("/", name="_index")
     */
    public function indexAction()
    {
        $this->mapManager->startNewGame();

        return $this->templating->renderResponse('GameBundle:Default:index.html.twig');
    }

    /**
     * @Route("/play", name="_play")
     */
    public function playAction()
    {

        return $this->templating->renderResponse('GameBundle:Play:index.html.twig');
    }
}
