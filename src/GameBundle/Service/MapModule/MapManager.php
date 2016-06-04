<?php


namespace GameBundle\Service\MapModule;


use GameBundle\Model\GameMap;
use GameBundle\Service\RedisWrapper;
use GameBundle\Service\SessionManager;

class MapManager
{
    protected $redisWrapper;
    protected $sessionManager;
    const REDIS_MAP_SUFFIX = '_map';
    const GAME_ID_KEY = 'gameID';

    public function __construct(RedisWrapper $redisWrapper, SessionManager $sessionManager)
    {
        $this->redisWrapper = $redisWrapper;
        $this->sessionManager = $sessionManager;
    }

    public function startNewGame()
    {
        $gameID = $this->getNewGameID();
        $this->sessionManager->set(self::GAME_ID_KEY, $gameID);

        $gameMapBuilder = new GameMapBuilder();
        $gameMapBuilder->generateRandomMap();
        $this->redisWrapper->setObject($gameID . self::REDIS_MAP_SUFFIX, $gameMapBuilder->getGameMap());
    }

    /**
     * @return GameMap
     */
    public function getCurrentMap()
    {
        return $this->redisWrapper->getObject($this->getGameID() . self::REDIS_MAP_SUFFIX);
    }

    private function getNewGameID()
    {
        return uniqid();
    }

    private function getGameID()
    {
        return $this->sessionManager->get(self::GAME_ID_KEY);
    }
}