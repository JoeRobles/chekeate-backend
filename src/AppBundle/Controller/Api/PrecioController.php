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
use AppBundle\Entity\Precio;

/**
 * Precio controller.
 *
 * @Route("/api/precio")
 */
class PrecioController extends Controller
{
    private $headers = array(
        'Access-Control-Allow-Origin' => '*',
        'Content-Type' => 'application/json'
    );

    /**
     * Lists all Precio entities.
     *
     * @Route("/", name="api_precio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $precios = $em->getRepository('AppBundle:Precio')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize(array('precios' => $precios),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Finds and displays a Precio entity.
     *
     * @Route("/{id}", name="api_precio_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $precio = $em->getRepository('AppBundle:Precio')->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        if (!$precio instanceof Precio) {
            $jsonContent = $serializer->serialize(array('exception' => 'User not found'), 'json');

            return new Response($jsonContent, 404, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('precio' => $precio),'json');

        return new Response($jsonContent, 200, $this->headers);
    }
}
