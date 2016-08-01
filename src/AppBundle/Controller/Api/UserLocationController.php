<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\UserLocation;

/**
 * UserLocation controller.
 *
 * @Route("/api/userlocation")
 */
class UserLocationController extends Controller
{
    private $headers = array(
        'Access-Control-Allow-Origin' => '*',
        'Content-Type' => 'application/json'
    );

    /**
     * Lists all UserLocation entities.
     *
     * @Route("/", name="api_userLocation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userLocations = $em->getRepository('AppBundle:UserLocation')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize(array('data' => $userLocations),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Finds and displays a UserLocation entity.
     *
     * @Route("/{id}", name="api_userLocation_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $userLocation = $em->getRepository('AppBundle:UserLocation')->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        if (!$userLocation instanceof UserLocation) {
            $jsonContent = $serializer->serialize(array('exception' => 'User not found'), 'json');

            return new Response($jsonContent, 404, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('data' => $userLocation),'json');

        return new Response($jsonContent, 200, $this->headers);
    }
}
