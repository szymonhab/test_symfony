<?php

namespace GameBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction()
    {
        return new Response('<html><body>Hello test!</body></html>');
    }
}