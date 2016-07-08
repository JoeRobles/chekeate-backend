<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Precio;
use AppBundle\Form\PrecioType;

/**
 * Precio controller.
 *
 * @Route("/precio")
 */
class PrecioController extends Controller
{
    /**
     * Lists all Precio entities.
     *
     * @Route("/", name="precio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $precios = $em->getRepository('AppBundle:Precio')->findAll();

        return $this->render('precio/index.html.twig', array(
            'precios' => $precios,
        ));
    }

    /**
     * Creates a new Precio entity.
     *
     * @Route("/new", name="precio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $precio = new Precio();
        $form = $this->createForm('AppBundle\Form\PrecioType', $precio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($precio);
            $em->flush();

            return $this->redirectToRoute('precio_show', array('id' => $precio->getId()));
        }

        return $this->render('precio/new.html.twig', array(
            'precio' => $precio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Precio entity.
     *
     * @Route("/{id}", name="precio_show")
     * @Method("GET")
     */
    public function showAction(Precio $precio)
    {
        $deleteForm = $this->createDeleteForm($precio);

        return $this->render('precio/show.html.twig', array(
            'precio' => $precio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Precio entity.
     *
     * @Route("/{id}/edit", name="precio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Precio $precio)
    {
        $deleteForm = $this->createDeleteForm($precio);
        $editForm = $this->createForm('AppBundle\Form\PrecioType', $precio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($precio);
            $em->flush();

            return $this->redirectToRoute('precio_edit', array('id' => $precio->getId()));
        }

        return $this->render('precio/edit.html.twig', array(
            'precio' => $precio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Precio entity.
     *
     * @Route("/{id}", name="precio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Precio $precio)
    {
        $form = $this->createDeleteForm($precio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($precio);
            $em->flush();
        }

        return $this->redirectToRoute('precio_index');
    }

    /**
     * Creates a form to delete a Precio entity.
     *
     * @param Precio $precio The Precio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Precio $precio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('precio_delete', array('id' => $precio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
