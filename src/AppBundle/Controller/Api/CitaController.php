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
use AppBundle\Entity\Cita;

/**
 * Cita controller.
 *
 * @Route("/api/cita")
 */
class CitaController extends Controller
{
    private $headers = array(
        'Access-Control-Allow-Origin' => '*',
        'Content-Type' => 'application/json'
    );

    /**
     * Lists all Cita entities.
     *
     * @Route("/", name="api_cita_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $citas = $em->getRepository('AppBundle:Cita')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize(array('citas' => $citas),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Finds and displays a Cita entity.
     *
     * @Route("/{id}", name="api_cita_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $cita = $em->getRepository('AppBundle:Cita')->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('storageKey'));

        $normalizer->setCircularReferenceHandler(function($object) {
            return $object->getId();
        });

        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        if (!$cita instanceof Cita) {
            $jsonContent = $serializer->serialize(array('exception' => 'User not found'), 'json');

            return new Response($jsonContent, 404, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('cita' => $cita),'json');

        return new Response($jsonContent, 200, $this->headers);
    }
}
