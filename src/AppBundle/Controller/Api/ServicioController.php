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
use AppBundle\Entity\Servicio;

/**
 * Servicio controller.
 *
 * @Route("/api/servicio")
 */
class ServicioController extends Controller
{
    private $headers = array(
        'Access-Control-Allow-Origin' => '*',
        'Content-Type' => 'application/json'
    );

    /**
     * Lists all Servicio entities.
     *
     * @Route("/", name="api_servicio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servicios = $em->getRepository('AppBundle:Servicio')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize(array('servicios' => $servicios),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Finds and displays a Servicio entity.
     *
     * @Route("/{id}", name="api_servicio_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $servicio = $em->getRepository('AppBundle:Servicio')->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        if (!$servicio instanceof Servicio) {
            $jsonContent = $serializer->serialize(array('exception' => 'User not found'), 'json');

            return new Response($jsonContent, 404, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('servicio' => $servicio),'json');

        return new Response($jsonContent, 200, $this->headers);
    }
}
