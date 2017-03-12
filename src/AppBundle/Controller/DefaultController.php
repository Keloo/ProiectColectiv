<?php

namespace AppBundle\Controller;

use AppBundle\Entity\WorkLog;
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
        $workLogStats = [];
        $workLogs = $this->getDoctrine()->getRepository('AppBundle:WorkLog')->findAll();
        /** @var WorkLog $workLog */
        foreach ($workLogs as $workLog) {
            $year = $workLog->getStartTime()->format('Y');
            $month = $workLog->getStartTime()->format('m');
            $day = $workLog->getStartTime()->format('d');
            $hours = $workLog->getStartTime()->diff($workLog->getEndTime())->h;
            $workLogStats[] = [
                [$year, $month, $day],
                $hours,
            ];
        }

        return $this->render('board/index.html.twig', [
            'workLogStats' => json_encode($workLogStats),
            'user' => $this->getUser(),
        ]);
    }
}
