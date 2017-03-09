<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Associate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Associate controller.
 *
 */
class AssociateController extends Controller
{
    /**
     * Lists all associate entities.
     * @Security("has_role('ROLE_HR')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $associates = $em->getRepository('AppBundle:Associate')->findAll();

        return $this->render('associate/index.html.twig', array(
            'associates' => $associates,
        ));
    }

    /**
     * Creates a new associate entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function newAction(Request $request)
    {
        $associate = new Associate();
        $form = $this->createForm('AppBundle\Form\AssociateType', $associate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($associate);
            $em->flush($associate);

            return $this->redirectToRoute('associate_show', array('id' => $associate->getId()));
        }

        return $this->render('associate/new.html.twig', array(
            'associate' => $associate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a associate entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function showAction(Associate $associate)
    {
        $deleteForm = $this->createDeleteForm($associate);

        return $this->render('associate/show.html.twig', array(
            'associate' => $associate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing associate entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function editAction(Request $request, Associate $associate)
    {
        $deleteForm = $this->createDeleteForm($associate);
        $editForm = $this->createForm('AppBundle\Form\AssociateType', $associate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('associate_edit', array('id' => $associate->getId()));
        }

        return $this->render('associate/edit.html.twig', array(
            'associate' => $associate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a associate entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function deleteAction(Request $request, Associate $associate)
    {
        $form = $this->createDeleteForm($associate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($associate);
            $em->flush();
        }

        return $this->redirectToRoute('associate_index');
    }

    /**
     * Creates a form to delete a associate entity.
     *
     * @param Associate $associate The associate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Associate $associate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('associate_delete', array('id' => $associate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
