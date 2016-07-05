<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $response = json_encode(
            array(
                "data" => array()
            )
        );

        return new Response ($response, 201, array('Access-Control-Allow-Origin' => '*', 'Content-Type' => 'application/json'));
    }
}
