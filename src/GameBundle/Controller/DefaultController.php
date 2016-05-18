<?php

namespace GameBundle\Controller;

use Predis\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * Class DefaultController
 * @package GameBundle\Controller
 * @Route("/game")
 */
class DefaultController
{
    private $templating;
    private $redisWrapper;

    public function __construct(EngineInterface $templating, \RedisWrapper $redisWrapper)
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
        $single_server = [
            'host'     => 'redis',
            'port'     => 6379,
            'database' => 15,
        ];

        $client = new Client($single_server);

        $mkv = array(
            'uid:0001' => '1st user',
            'uid:0002' => '2nd user',
            'uid:0003' => '3rd user',
        );

        $client->mset($mkv);
        $response = $client->mget(array_keys($mkv));

        var_export($response); exit;

        return $this->templating->renderResponse('GameBundle:Play:index.html.twig');
    }
}
