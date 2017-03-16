<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Pdf controller.
 *
 */
class PdfController extends Controller
{
    /**
     * Lists all pdf entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pdfs = $em->getRepository('AppBundle:Pdf')->findAll();

        return $this->render('pdf/index.html.twig', array(
            'pdfs' => $pdfs,
        ));
    }

    /**
     * Finds and displays a pdf entity.
     *
     */
    public function showAction(Pdf $pdf)
    {

        return $this->render('pdf/show.html.twig', array(
            'pdf' => $pdf,
        ));
    }

    public function downloadAction(Pdf $pdf)
    {
        $html = $this->renderView('::pdf/download/'.$pdf->getName().'.html.twig');

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="demand_'.$pdf->getName().'.pdf"'
            )
        );;
    }
}
