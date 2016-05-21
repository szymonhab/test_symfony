<?php

namespace GameBundle\Service;

use Predis\Client;

class RedisWrapper
{
    private $client;

    public function __construct()
    {
        $server = [
            'host'     => 'redis',
            'port'     => 6379,
            'database' => 15,
        ];

        $this->client = new Client($server);
    }
    
    public function setObject($key, $object)
    {
        $this->client->set((string) $key, serialize($object));
    }

    public function getObject($key)
    {
        return unserialize($this->client->get((string) $key));
    }
}