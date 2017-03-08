<?php

namespace AppBundle\Controller;

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
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jobVacancies = $em->getRepository('AppBundle:JobVacancy')->findAll();

        return $this->render('jobvacancy/index.html.twig', array(
            'jobVacancies' => $jobVacancies,
        ));
    }

    /**
     * Creates a new jobVacancy entity.
     *
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

        return $this->render('jobvacancy/new.html.twig', array(
            'jobVacancy' => $jobVacancy,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jobVacancy entity.
     *
     */
    public function showAction(JobVacancy $jobVacancy)
    {
        $deleteForm = $this->createDeleteForm($jobVacancy);

        return $this->render('jobvacancy/show.html.twig', array(
            'jobVacancy' => $jobVacancy,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jobVacancy entity.
     *
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

        return $this->render('jobvacancy/edit.html.twig', array(
            'jobVacancy' => $jobVacancy,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jobVacancy entity.
     *
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
