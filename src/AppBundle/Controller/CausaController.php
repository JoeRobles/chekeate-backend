<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Causa;
use AppBundle\Form\CausaType;

/**
 * Causa controller.
 *
 * @Route("/causa")
 */
class CausaController extends Controller
{
    /**
     * Lists all Causa entities.
     *
     * @Route("/", name="causa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $causas = $em->getRepository('AppBundle:Causa')->findAll();


        $response = json_encode(
            array(
                'causas' => $causas
            )
        );

        return new Response($response, 201, array('Access-Control-Allow-Origin' => '*', 'Content-Type' => 'application/json'));
    }

    /**
     * Creates a new Causa entity.
     *
     * @Route("/new", name="causa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $causa = new Causa();
        $form = $this->createForm('AppBundle\Form\CausaType', $causa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($causa);
            $em->flush();

            return $this->redirectToRoute('causa_show', array('id' => $causa->getId()));
        }

        return $this->render('causa/new.html.twig', array(
            'causa' => $causa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Causa entity.
     *
     * @Route("/{id}", name="causa_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $causa = $em->getRepository('AppBundle:Causa')->find($id);
var_dump($causa);
        $response = json_encode(
            array(
                'causa' => $causa
            )
        );

        return new Response($response, 201, array('Access-Control-Allow-Origin' => '*', 'Content-Type' => 'application/json'));
    }

    /**
     * Displays a form to edit an existing Causa entity.
     *
     * @Route("/{id}/edit", name="causa_edit")
     * @Method({"GET", "POST"})
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
     * @Route("/{id}", name="causa_delete")
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
