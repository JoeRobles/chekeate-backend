<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\UserLocation;
use AppBundle\Form\UserLocationType;

/**
 * UserLocation controller.
 *
 * @Route("/userlocation")
 */
class UserLocationController extends Controller
{
    /**
     * Lists all UserLocation entities.
     *
     * @Route("/", name="userlocation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userLocations = $em->getRepository('AppBundle:UserLocation')->findAll();

        return $this->render('userlocation/index.html.twig', array(
            'userLocations' => $userLocations,
        ));
    }

    /**
     * Creates a new UserLocation entity.
     *
     * @Route("/new", name="userlocation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userLocation = new UserLocation();
        $form = $this->createForm('AppBundle\Form\UserLocationType', $userLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userLocation);
            $em->flush();

            return $this->redirectToRoute('userlocation_show', array('id' => $userLocation->getId()));
        }

        return $this->render('userlocation/new.html.twig', array(
            'userLocation' => $userLocation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserLocation entity.
     *
     * @Route("/{id}", name="userlocation_show")
     * @Method("GET")
     */
    public function showAction(UserLocation $userLocation)
    {
        $deleteForm = $this->createDeleteForm($userLocation);

        return $this->render('userlocation/show.html.twig', array(
            'userLocation' => $userLocation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserLocation entity.
     *
     * @Route("/{id}/edit", name="userlocation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UserLocation $userLocation)
    {
        $deleteForm = $this->createDeleteForm($userLocation);
        $editForm = $this->createForm('AppBundle\Form\UserLocationType', $userLocation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userLocation);
            $em->flush();

            return $this->redirectToRoute('userlocation_edit', array('id' => $userLocation->getId()));
        }

        return $this->render('userlocation/edit.html.twig', array(
            'userLocation' => $userLocation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a UserLocation entity.
     *
     * @Route("/{id}", name="userlocation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserLocation $userLocation)
    {
        $form = $this->createDeleteForm($userLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userLocation);
            $em->flush();
        }

        return $this->redirectToRoute('userlocation_index');
    }

    /**
     * Creates a form to delete a UserLocation entity.
     *
     * @param UserLocation $userLocation The UserLocation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserLocation $userLocation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userlocation_delete', array('id' => $userLocation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
