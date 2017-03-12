<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\DemandType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demandtype controller.
 *
 */
class DemandTypeController extends Controller
{
    /**
     * Lists all demandType entities.
     * @Security("has_role('ROLE_HR')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandTypes = $em->getRepository('AppBundle:DemandType')->findAll();

        return $this->render('board/demandtype/index.html.twig', array(
            'user' => $this->getUser(),
            'demandTypes' => $demandTypes,
        ));
    }

    /**
     * Creates a new demandType entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function newAction(Request $request)
    {
        $demandType = new Demandtype();
        $form = $this->createForm('AppBundle\Form\DemandTypeType', $demandType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandType);
            $em->flush($demandType);

            return $this->redirectToRoute('demandtype_show', array('id' => $demandType->getId()));
        }

        return $this->render('board/demandtype/new.html.twig', array(
            'demandType' => $demandType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demandType entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function showAction(DemandType $demandType)
    {
        $deleteForm = $this->createDeleteForm($demandType);

        return $this->render('board/demandtype/show.html.twig', array(
            'demandType' => $demandType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demandType entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function editAction(Request $request, DemandType $demandType)
    {
        $deleteForm = $this->createDeleteForm($demandType);
        $editForm = $this->createForm('AppBundle\Form\DemandTypeType', $demandType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandtype_edit', array('id' => $demandType->getId()));
        }

        return $this->render('board/demandtype/edit.html.twig', array(
            'demandType' => $demandType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demandType entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function deleteAction(Request $request, DemandType $demandType)
    {
        $form = $this->createDeleteForm($demandType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandType);
            $em->flush();
        }

        return $this->redirectToRoute('demandtype_index');
    }

    /**
     * Creates a form to delete a demandType entity.
     *
     * @param DemandType $demandType The demandType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DemandType $demandType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandtype_delete', array('id' => $demandType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
