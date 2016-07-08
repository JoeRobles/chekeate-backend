<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Centro;
use AppBundle\Form\CentroType;

/**
 * Centro controller.
 *
 * @Route("/centro")
 */
class CentroController extends Controller
{
    /**
     * Lists all Centro entities.
     *
     * @Route("/", name="centro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $centros = $em->getRepository('AppBundle:Centro')->findAll();

        return $this->render('centro/index.html.twig', array(
            'centros' => $centros,
        ));
    }

    /**
     * Creates a new Centro entity.
     *
     * @Route("/new", name="centro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $centro = new Centro();
        $form = $this->createForm('AppBundle\Form\CentroType', $centro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($centro);
            $em->flush();

            return $this->redirectToRoute('centro_show', array('id' => $centro->getId()));
        }

        return $this->render('centro/new.html.twig', array(
            'centro' => $centro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Centro entity.
     *
     * @Route("/{id}", name="centro_show")
     * @Method("GET")
     */
    public function showAction(Centro $centro)
    {
        $deleteForm = $this->createDeleteForm($centro);

        return $this->render('centro/show.html.twig', array(
            'centro' => $centro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Centro entity.
     *
     * @Route("/{id}/edit", name="centro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Centro $centro)
    {
        $deleteForm = $this->createDeleteForm($centro);
        $editForm = $this->createForm('AppBundle\Form\CentroType', $centro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($centro);
            $em->flush();

            return $this->redirectToRoute('centro_edit', array('id' => $centro->getId()));
        }

        return $this->render('centro/edit.html.twig', array(
            'centro' => $centro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Centro entity.
     *
     * @Route("/{id}", name="centro_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Centro $centro)
    {
        $form = $this->createDeleteForm($centro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($centro);
            $em->flush();
        }

        return $this->redirectToRoute('centro_index');
    }

    /**
     * Creates a form to delete a Centro entity.
     *
     * @param Centro $centro The Centro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Centro $centro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('centro_delete', array('id' => $centro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
