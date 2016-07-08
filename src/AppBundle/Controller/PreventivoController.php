<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Preventivo;
use AppBundle\Form\PreventivoType;

/**
 * Preventivo controller.
 *
 * @Route("/preventivo")
 */
class PreventivoController extends Controller
{
    /**
     * Lists all Preventivo entities.
     *
     * @Route("/", name="preventivo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $preventivos = $em->getRepository('AppBundle:Preventivo')->findAll();

        return $this->render('preventivo/index.html.twig', array(
            'preventivos' => $preventivos,
        ));
    }

    /**
     * Creates a new Preventivo entity.
     *
     * @Route("/new", name="preventivo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $preventivo = new Preventivo();
        $form = $this->createForm('AppBundle\Form\PreventivoType', $preventivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($preventivo);
            $em->flush();

            return $this->redirectToRoute('preventivo_show', array('id' => $preventivo->getId()));
        }

        return $this->render('preventivo/new.html.twig', array(
            'preventivo' => $preventivo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Preventivo entity.
     *
     * @Route("/{id}", name="preventivo_show")
     * @Method("GET")
     */
    public function showAction(Preventivo $preventivo)
    {
        $deleteForm = $this->createDeleteForm($preventivo);

        return $this->render('preventivo/show.html.twig', array(
            'preventivo' => $preventivo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Preventivo entity.
     *
     * @Route("/{id}/edit", name="preventivo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Preventivo $preventivo)
    {
        $deleteForm = $this->createDeleteForm($preventivo);
        $editForm = $this->createForm('AppBundle\Form\PreventivoType', $preventivo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($preventivo);
            $em->flush();

            return $this->redirectToRoute('preventivo_edit', array('id' => $preventivo->getId()));
        }

        return $this->render('preventivo/edit.html.twig', array(
            'preventivo' => $preventivo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Preventivo entity.
     *
     * @Route("/{id}", name="preventivo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Preventivo $preventivo)
    {
        $form = $this->createDeleteForm($preventivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($preventivo);
            $em->flush();
        }

        return $this->redirectToRoute('preventivo_index');
    }

    /**
     * Creates a form to delete a Preventivo entity.
     *
     * @param Preventivo $preventivo The Preventivo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Preventivo $preventivo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('preventivo_delete', array('id' => $preventivo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
