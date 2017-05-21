<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Applicant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Applicant controller.
 *
 */
class ApplicantController extends Controller
{
    /**
     * Lists all applicant entities.
     * @Security("has_role('ROLE_HR')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $applicants = $em->getRepository('AppBundle:Applicant')->findAll();

        return $this->render('board/applicant/index.html.twig', array(
            'user' => $this->getUser(),
            'applicants' => $applicants,
        ));
    }

    /**
     * Creates a new applicant entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function newAction(Request $request)
    {
        $applicant = new Applicant();
        $form = $this->createForm('AppBundle\Form\ApplicantType', $applicant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->flush($applicant);

            return $this->redirectToRoute('applicant_show', array('id' => $applicant->getId()));
        }

        return $this->render('board/applicant/new.html.twig', array(
            'user' => $this->getUser(),
            'applicant' => $applicant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a applicant entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function showAction(Applicant $applicant)
    {
        return $this->redirectToRoute('applicant_index');
    }

    /**
     * Displays a form to edit an existing applicant entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function editAction(Request $request, Applicant $applicant)
    {
        $deleteForm = $this->createDeleteForm($applicant);
        $editForm = $this->createForm('AppBundle\Form\ApplicantType', $applicant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('applicant_index', array('id' => $applicant->getId()));
        }

        return $this->render('board/applicant/edit.html.twig', array(
            'applicant' => $applicant,
            'user' => $this->getUser(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a applicant entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function deleteAction(Request $request, Applicant $applicant)
    {
        $form = $this->createDeleteForm($applicant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($applicant);
            $em->flush();
        }

        return $this->redirectToRoute('applicant_index');
    }

    /**
     * Creates a form to delete a applicant entity.
     *
     * @param Applicant $applicant The applicant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Applicant $applicant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('applicant_delete', array('id' => $applicant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
