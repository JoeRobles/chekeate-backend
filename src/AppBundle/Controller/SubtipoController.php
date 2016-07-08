<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Subtipo;
use AppBundle\Form\SubtipoType;

/**
 * Subtipo controller.
 *
 * @Route("/subtipo")
 */
class SubtipoController extends Controller
{
    /**
     * Lists all Subtipo entities.
     *
     * @Route("/", name="subtipo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subtipos = $em->getRepository('AppBundle:Subtipo')->findAll();

        return $this->render('subtipo/index.html.twig', array(
            'subtipos' => $subtipos,
        ));
    }

    /**
     * Creates a new Subtipo entity.
     *
     * @Route("/new", name="subtipo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subtipo = new Subtipo();
        $form = $this->createForm('AppBundle\Form\SubtipoType', $subtipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subtipo);
            $em->flush();

            return $this->redirectToRoute('subtipo_show', array('id' => $subtipo->getId()));
        }

        return $this->render('subtipo/new.html.twig', array(
            'subtipo' => $subtipo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Subtipo entity.
     *
     * @Route("/{id}", name="subtipo_show")
     * @Method("GET")
     */
    public function showAction(Subtipo $subtipo)
    {
        $deleteForm = $this->createDeleteForm($subtipo);

        return $this->render('subtipo/show.html.twig', array(
            'subtipo' => $subtipo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Subtipo entity.
     *
     * @Route("/{id}/edit", name="subtipo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subtipo $subtipo)
    {
        $deleteForm = $this->createDeleteForm($subtipo);
        $editForm = $this->createForm('AppBundle\Form\SubtipoType', $subtipo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subtipo);
            $em->flush();

            return $this->redirectToRoute('subtipo_edit', array('id' => $subtipo->getId()));
        }

        return $this->render('subtipo/edit.html.twig', array(
            'subtipo' => $subtipo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Subtipo entity.
     *
     * @Route("/{id}", name="subtipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subtipo $subtipo)
    {
        $form = $this->createDeleteForm($subtipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subtipo);
            $em->flush();
        }

        return $this->redirectToRoute('subtipo_index');
    }

    /**
     * Creates a form to delete a Subtipo entity.
     *
     * @param Subtipo $subtipo The Subtipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subtipo $subtipo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subtipo_delete', array('id' => $subtipo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
