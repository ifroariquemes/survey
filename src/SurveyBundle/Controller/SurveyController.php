<?php

namespace SurveyBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SurveyController extends Controller {

    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction(Request $request) {
        $a = new \SurveyBundle\Entity\QuestionDiscursive();
        $a->setEnunciation('Fale sobre isso.');
        $b = new \SurveyBundle\Entity\QuestionObjective();
        $b->setEnunciation('Escolha um desses:');
        $b->addChoice('Op 1');
        $b->addChoice('Op 2');
        $b->addChoice('Op 3');
        $b->addChoice('Op 4');
        
        return $this->render('survey/dashboard.html.twig', [
                    'user' => $this->getUser(),
                    'questions' => [$a, $b]
        ]);
    }

}
