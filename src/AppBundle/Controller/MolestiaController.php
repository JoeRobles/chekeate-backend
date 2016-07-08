<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Molestia;
use AppBundle\Form\MolestiaType;

/**
 * Molestia controller.
 *
 * @Route("/molestia")
 */
class MolestiaController extends Controller
{
    /**
     * Lists all Molestia entities.
     *
     * @Route("/", name="molestia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $molestias = $em->getRepository('AppBundle:Molestia')->findAll();

        return $this->render('molestia/index.html.twig', array(
            'molestias' => $molestias,
        ));
    }

    /**
     * Creates a new Molestia entity.
     *
     * @Route("/new", name="molestia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $molestium = new Molestia();
        $form = $this->createForm('AppBundle\Form\MolestiaType', $molestium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($molestium);
            $em->flush();

            return $this->redirectToRoute('molestia_show', array('id' => $molestium->getId()));
        }

        return $this->render('molestia/new.html.twig', array(
            'molestium' => $molestium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Molestia entity.
     *
     * @Route("/{id}", name="molestia_show")
     * @Method("GET")
     */
    public function showAction(Molestia $molestium)
    {
        $deleteForm = $this->createDeleteForm($molestium);

        return $this->render('molestia/show.html.twig', array(
            'molestium' => $molestium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Molestia entity.
     *
     * @Route("/{id}/edit", name="molestia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Molestia $molestium)
    {
        $deleteForm = $this->createDeleteForm($molestium);
        $editForm = $this->createForm('AppBundle\Form\MolestiaType', $molestium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($molestium);
            $em->flush();

            return $this->redirectToRoute('molestia_edit', array('id' => $molestium->getId()));
        }

        return $this->render('molestia/edit.html.twig', array(
            'molestium' => $molestium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Molestia entity.
     *
     * @Route("/{id}", name="molestia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Molestia $molestium)
    {
        $form = $this->createDeleteForm($molestium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($molestium);
            $em->flush();
        }

        return $this->redirectToRoute('molestia_index');
    }

    /**
     * Creates a form to delete a Molestia entity.
     *
     * @param Molestia $molestium The Molestia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Molestia $molestium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('molestia_delete', array('id' => $molestium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
