<?php

namespace AppBundle\Controller;

use AppBundle\Form\DeclineReasonType;
use AppBundle\Form\Model\DeclineReason;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $reason = new DeclineReason();
        $form = $this->createForm(DeclineReasonType::class, $reason);

        $form->handleRequest($request);


        // replace this example code with whatever you need
        return $this->render('default/decline.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
