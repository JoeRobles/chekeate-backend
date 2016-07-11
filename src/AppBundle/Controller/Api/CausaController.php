<?php

namespace AppBundle\Controller\Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Causa;
use AppBundle\Form\CausaType;

/**
 * Causa controller.
 *
 * @Route("/api/causa")
 */
class CausaController extends Controller
{
    private $headers = array(
        'Access-Control-Allow-Origin' => '*',
        'Content-Type' => 'application/json'
    );

    /**
     * Lists all Causa entities.
     *
     * @Route("/", name="api_causa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $causas = $em->getRepository('AppBundle:Causa')->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize(array('causas' => $causas),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Creates a new Causa entity.
     *
     * @Route("/", name="api_causa_new")
     */
    public function newAction(Request $request)
    {
        $causa = new Causa();
        $form = $this->createForm('AppBundle\Form\CausaType', $causa);
        $form->handleRequest($request);

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($causa);
            $em->flush();

            $jsonContent = $serializer->serialize(array('causa' => 'created'), 'json');

            return new Response($jsonContent, 302, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('exception' => 'Form has to be submitted'), 'json');

        return new Response($jsonContent, 400, $this->headers);
    }

    /**
     * Finds and displays a Causa entity.
     *
     * @Route("/{id}", name="api_causa_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $causa = $em->getRepository('AppBundle:Causa')->find($id);

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        if (!$causa instanceof Causa) {
            $jsonContent = $serializer->serialize(array('exception' => 'User not found'), 'json');

            return new Response($jsonContent, 404, $this->headers);
        }

        $jsonContent = $serializer->serialize(array('causa' => $causa),'json');

        return new Response($jsonContent, 200, $this->headers);
    }

    /**
     * Displays a form to edit an existing Causa entity.
     *
     * @Route("/{id}", name="api_causa_edit")
     * @Method("PUT")
     */
    public function editAction(Request $request, Causa $causa)
    {
        $deleteForm = $this->createDeleteForm($causa);
        $editForm = $this->createForm('AppBundle\Form\CausaType', $causa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($causa);
            $em->flush();

            return $this->redirectToRoute('causa_edit', array('id' => $causa->getId()));
        }

        return $this->render('causa/edit.html.twig', array(
            'causa' => $causa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Causa entity.
     *
     * @Route("/{id}", name="api_causa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Causa $causa)
    {
        $form = $this->createDeleteForm($causa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($causa);
            $em->flush();
        }

        return $this->redirectToRoute('causa_index');
    }

    /**
     * Creates a form to delete a Causa entity.
     *
     * @param Causa $causa The Causa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Causa $causa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('causa_delete', array('id' => $causa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
