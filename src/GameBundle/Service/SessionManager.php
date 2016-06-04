<?php

namespace GameBundle\Service;


use Symfony\Component\HttpFoundation\Session\Session;

class SessionManager
{
    const PREFIX = 'GameBundle_';
    protected $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function set($key, $value)
    {
        $this->session->set(self::PREFIX . $key, $value);
    }

    public function get($key)
    {
        return $this->session->get(self::PREFIX . $key);
    }
}