<?php

namespace AppBundle\Controller;

use AppBundle\Form\DeclineReasonType;
use AppBundle\Form\Model\DeclineReason;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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

    /**
     * @param Request $request
     * @param int     $id      Job id (not used)
     * @Route("/set-reason/{id}", name="agent_decline_reason")
     * @Method("Post")
     */
    public function setReasonAction(Request $request, int $id)
    {
        $form = $this->createForm(DeclineReasonType::class,  new DeclineReason());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $result  = [
                'status' => 'ok',
                'message' => 'message.ok',
            ];

        } else {
            $errors = $form->getErrors();
            $result = [
                'status' => 'error',
                'message' => 'message.error',
                'errors' => $errors,
            ];
        }

        return $this->json($result);
    }
}
