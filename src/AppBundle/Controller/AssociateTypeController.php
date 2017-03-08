<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AssociateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Associatetype controller.
 *
 */
class AssociateTypeController extends Controller
{
    /**
     * Lists all associateType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $associateTypes = $em->getRepository('AppBundle:AssociateType')->findAll();

        return $this->render('associatetype/index.html.twig', array(
            'associateTypes' => $associateTypes,
        ));
    }

    /**
     * Creates a new associateType entity.
     *
     */
    public function newAction(Request $request)
    {
        $associateType = new Associatetype();
        $form = $this->createForm('AppBundle\Form\AssociateTypeType', $associateType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($associateType);
            $em->flush($associateType);

            return $this->redirectToRoute('associatetype_show', array('id' => $associateType->getId()));
        }

        return $this->render('associatetype/new.html.twig', array(
            'associateType' => $associateType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a associateType entity.
     *
     */
    public function showAction(AssociateType $associateType)
    {
        $deleteForm = $this->createDeleteForm($associateType);

        return $this->render('associatetype/show.html.twig', array(
            'associateType' => $associateType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing associateType entity.
     *
     */
    public function editAction(Request $request, AssociateType $associateType)
    {
        $deleteForm = $this->createDeleteForm($associateType);
        $editForm = $this->createForm('AppBundle\Form\AssociateTypeType', $associateType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('associatetype_edit', array('id' => $associateType->getId()));
        }

        return $this->render('associatetype/edit.html.twig', array(
            'associateType' => $associateType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a associateType entity.
     *
     */
    public function deleteAction(Request $request, AssociateType $associateType)
    {
        $form = $this->createDeleteForm($associateType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($associateType);
            $em->flush();
        }

        return $this->redirectToRoute('associatetype_index');
    }

    /**
     * Creates a form to delete a associateType entity.
     *
     * @param AssociateType $associateType The associateType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AssociateType $associateType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('associatetype_delete', array('id' => $associateType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
