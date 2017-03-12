<?php

namespace AppBundle\Controller;

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
        return $this->render('board/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
