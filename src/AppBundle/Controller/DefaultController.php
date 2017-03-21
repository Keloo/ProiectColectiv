<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\WorkLog;
use Doctrine\Common\Collections\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        if ($this->isGranted("IS_AUTHENTICATED_FULLY")) {
            return $this->redirectToRoute("board_index");
        } else {
            return $this->redirectToRoute("fos_user_security_login");
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    public function boardIndexAction(Request $request)
    {
        $totalHoursWorked = 0;
        $moneySpent = 0;
        $workLogStats = [];
        if (in_array('ROLE_HR', $this->getUser()->getRoles())) {
            $workLogs = $this->getDoctrine()->getRepository('AppBundle:WorkLog')->findAll();
        } else {
            $workLogs = $this->getDoctrine()->getRepository('AppBundle:WorkLog')->findBy(['user' => $this->getUser()]);
        }
        /** @var WorkLog $workLog */
        foreach ($workLogs as $workLog) {
            $year = $workLog->getStartTime()->format('Y');
            $month = $workLog->getStartTime()->format('m');
            $day = $workLog->getStartTime()->format('d');
            $hours = $workLog->getStartTime()->diff($workLog->getEndTime())->h;
            $totalHoursWorked += $hours;
            $moneySpent += $hours*$workLog->getUser()->getJobVacancy()->getRate();

            $updated = false;
            for ($i = 0; $i<sizeof($workLogStats); $i++) {
                if ($workLogStats[$i][0] == [$year, $month, $day]) {
                    $workLogStats[$i][1] += $hours;
                    $updated = true;
                    break;
                }
            }
            if (!$updated) {
                $workLogStats[] = [
                    [$year, $month, $day],
                    $hours,
                ];
            }
        }

        /** @var Collection $activeUsers */
        $activeUsers = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(['work_end_date' => null]);
        $totalBudget = 0;

        /** @var User $activeUser */
        foreach ($activeUsers as $activeUser) {
            $totalBudget += 140*$activeUser->getJobVacancy()->getRate();
        }

        return $this->render('board/index.html.twig', [
            'vacancyCount' => $this->getParameter('vacancy_count'),
            'totalHoursWorked' => $totalHoursWorked,
            'activeUsers' => $activeUsers,
            'moneySpent' => $moneySpent,
            'totalBudget' => $totalBudget,
            'workLogStats' => json_encode($workLogStats),
            'user' => $this->getUser(),
        ]);
    }
}
