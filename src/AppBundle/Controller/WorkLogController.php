<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\User;
use AppBundle\Entity\WorkLog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Worklog controller.
 *
 */
class WorkLogController extends Controller
{
    /**
     * Lists all workLog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $this->getUser();

        if (in_array('ROLE_HR', $user->getRoles())) {
            $workLogs = $em->getRepository("AppBundle:WorkLog")->findAll();
        } else {
            $workLogs = $user->getWorkLogs();
        }

        return $this->render('board/worklog/index.html.twig', array(
            'user' => $this->getUser(),
            'workLogs' => $workLogs,
        ));
    }

    /**
     * Creates a new workLog entity.
     * @Security("has_role('ROLE_EMPLOYEE')")
     */
    public function newAction(Request $request)
    {
        $workLog = new Worklog();
        $form = $this->createForm('AppBundle\Form\WorkLogType', $workLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($workLog);
            $em->flush($workLog);

            return $this->redirectToRoute('worklog_show', array('id' => $workLog->getId()));
        }

        return $this->render('board/worklog/new.html.twig', array(
            'workLog' => $workLog,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a workLog entity.
     */
    public function showAction(WorkLog $workLog)
    {
        $deleteForm = $this->createDeleteForm($workLog);

        return $this->render('board/worklog/show.html.twig', array(
            'workLog' => $workLog,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing workLog entity.
     * @Security("has_role('ROLE_EMPLOYEE')")
     */
    public function editAction(Request $request, WorkLog $workLog)
    {
        $deleteForm = $this->createDeleteForm($workLog);
        $editForm = $this->createForm('AppBundle\Form\WorkLogType', $workLog);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('worklog_edit', array('id' => $workLog->getId()));
        }

        return $this->render('board/worklog/edit.html.twig', array(
            'workLog' => $workLog,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a workLog entity.
     * @Security("has_role('ROLE_EMPLOYEE')")
     */
    public function deleteAction(Request $request, WorkLog $workLog)
    {
        $form = $this->createDeleteForm($workLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($workLog);
            $em->flush();
        }

        return $this->redirectToRoute('worklog_index');
    }

    /**
     * Creates a form to delete a workLog entity.
     *
     * @param WorkLog $workLog The workLog entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(WorkLog $workLog)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('worklog_delete', array('id' => $workLog->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
