<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Alert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Alert controller.
 *
 */
class AlertController extends Controller
{
    /**
     * Lists all alert entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alerts = $em->getRepository('AppBundle:Alert')->findAll();

        return $this->render('alert/index.html.twig', array(
            'alerts' => $alerts,
        ));
    }

    /**
     * Creates a new alert entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function newAction(Request $request)
    {
        $alert = new Alert();
        $form = $this->createForm('AppBundle\Form\AlertType', $alert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alert);
            $em->flush($alert);

            return $this->redirectToRoute('alert_show', array('id' => $alert->getId()));
        }

        return $this->render('alert/new.html.twig', array(
            'alert' => $alert,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a alert entity.
     *
     */
    public function showAction(Alert $alert)
    {
        $deleteForm = $this->createDeleteForm($alert);

        return $this->render('alert/show.html.twig', array(
            'alert' => $alert,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing alert entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function editAction(Request $request, Alert $alert)
    {
        $deleteForm = $this->createDeleteForm($alert);
        $editForm = $this->createForm('AppBundle\Form\AlertType', $alert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('alert_edit', array('id' => $alert->getId()));
        }

        return $this->render('alert/edit.html.twig', array(
            'alert' => $alert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a alert entity.
     * @Security("has_role('ROLE_HR')")
     */
    public function deleteAction(Request $request, Alert $alert)
    {
        $form = $this->createDeleteForm($alert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($alert);
            $em->flush();
        }

        return $this->redirectToRoute('alert_index');
    }

    /**
     * Creates a form to delete a alert entity.
     *
     * @param Alert $alert The alert entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Alert $alert)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alert_delete', array('id' => $alert->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
