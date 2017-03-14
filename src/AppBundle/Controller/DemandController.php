<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Demand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demand controller.
 *
 */
class DemandController extends Controller
{
    /**
     * Lists all demand entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $this->getUser();

        if (in_array('ROLE_HR', $user->getRoles())) {
            $demands = $em->getRepository('AppBundle:Demand')->findAll();
        } else {
            $demands = $user->getDemands();
        }

        return $this->render('board/demand/index.html.twig', array(
            'user' => $this->getUser(),
            'demands' => $demands,
        ));
    }

    /**
     * Creates a new demand entity.
     * @Security("has_role('ROLE_EMPLOYEE')")
     */
    public function newAction(Request $request)
    {
        $demand = new Demand();
        $form = $this->createForm('AppBundle\Form\DemandType', $demand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $demand->setUser($this->getUser());
            $em->persist($demand);
            $em->flush($demand);

            return $this->redirectToRoute('demand_show', array('id' => $demand->getId()));
        }

        return $this->render('board/demand/new.html.twig', array(
            'demand' => $demand,
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demand entity.
     */
    public function showAction(Demand $demand)
    {
        return $this->redirectToRoute('demand_index');
    }

    /**
     * @param Request $request
     * @param Demand $demand
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Demand $demand)
    {
        $deleteForm = $this->createDeleteForm($demand);
        $editForm = $this->createForm('AppBundle\Form\DemandType', $demand);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $demand->setUser($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demand_edit', array('id' => $demand->getId()));
        }

        return $this->render('board/demand/edit.html.twig', array(
            'demand' => $demand,
            'user' => $this->getUser(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param Demand $demand
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Demand $demand)
    {
        $form = $this->createDeleteForm($demand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demand);
            $em->flush();
        }

        return $this->redirectToRoute('demand_index');
    }

    /**
     * Creates a form to delete a demand entity.
     *
     * @param Demand $demand The demand entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demand $demand)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demand_delete', array('id' => $demand->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
