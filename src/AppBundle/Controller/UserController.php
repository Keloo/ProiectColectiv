<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\WorkLog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();

        foreach ($users as $user) {
            $hoursWorked = 0;
            /** @var WorkLog $workLog */
            foreach ($user->getWorkLogs() as $workLog) {
                $hoursWorked += $workLog->getStartTime()->diff($workLog->getEndTime())->h;
            }
            $user->setHoursWorked($hoursWorked);
        }

        return $this->render('board/user/index.html.twig', array(
            'user' => $this->getUser(),
            'users' => $users,
        ));
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function fireAction(User $user)
    {
        $user->setWorkEndDate(new \DateTime('now'));
        $this->getDoctrine()->getManager()->flush($user);

        return $this->redirectToRoute('employee_index');
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        return $this->render('board/user/show.html.twig', array(
            'user' => $user,
        ));
    }
}
