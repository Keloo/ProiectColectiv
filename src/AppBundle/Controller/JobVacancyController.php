<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\JobVacancy;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Jobvacancy controller.
 *
 */
class JobVacancyController extends Controller
{
    /**
     * Lists all jobVacancy entities.
     * @Security("has_role('ROLE_HR')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jobVacancies = $em->getRepository('AppBundle:JobVacancy')->findAll();

        return $this->render('board/jobvacancy/index.html.twig', array(
            'user' => $this->getUser(),
            'jobVacancies' => $jobVacancies,
        ));
    }

    /**
     * Creates a new jobVacancy entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function newAction(Request $request)
    {
        $jobVacancy = new Jobvacancy();
        $form = $this->createForm('AppBundle\Form\JobVacancyType', $jobVacancy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jobVacancy);
            $em->flush($jobVacancy);

            return $this->redirectToRoute('jobvacancy_show', array('id' => $jobVacancy->getId()));
        }

        return $this->render('board/jobvacancy/new.html.twig', array(
            'jobVacancy' => $jobVacancy,
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jobVacancy entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function showAction(JobVacancy $jobVacancy)
    {
        return $this->redirectToRoute('jobvacancy_index');
    }

    /**
     * Displays a form to edit an existing jobVacancy entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function editAction(Request $request, JobVacancy $jobVacancy)
    {
        $deleteForm = $this->createDeleteForm($jobVacancy);
        $editForm = $this->createForm('AppBundle\Form\JobVacancyType', $jobVacancy);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jobvacancy_edit', array('id' => $jobVacancy->getId()));
        }

        return $this->render('board/jobvacancy/edit.html.twig', array(
            'jobVacancy' => $jobVacancy,
            'user' => $this->getUser(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jobVacancy entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function deleteAction(Request $request, JobVacancy $jobVacancy)
    {
        $form = $this->createDeleteForm($jobVacancy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jobVacancy);
            $em->flush();
        }

        return $this->redirectToRoute('jobvacancy_index');
    }

    /**
     * Creates a form to delete a jobVacancy entity.
     *
     * @param JobVacancy $jobVacancy The jobVacancy entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(JobVacancy $jobVacancy)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jobvacancy_delete', array('id' => $jobVacancy->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
