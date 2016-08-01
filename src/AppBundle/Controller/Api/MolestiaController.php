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
use AppBundle\Entity\Molestia;

/**
 * Molestia controller.
 *
 * @Route("/api/molestia")
 */
class MolestiaController extends Controller
{
    private $headers = array(
        'Access-Control-Allow-Origin' => '*',
        'Content-Type' => 'application/json'
    );

    /**
     * Lists all Molestia entities.
     *
     * @Route("/", name="api_molestia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $molestias = $em->getRepository('AppBundle:Molestia')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize(array('data' => $molestias),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Finds and displays a Molestia entity.
     *
     * @Route("/{id}", name="api_molestia_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $molestia = $em->getRepository('AppBundle:Molestia')->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        if (!$molestia instanceof Molestia) {
            $jsonContent = $serializer->serialize(array('exception' => 'User not found'), 'json');

            return new Response($jsonContent, 404, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('data' => $molestia),'json');

        return new Response($jsonContent, 200, $this->headers);
    }
}
