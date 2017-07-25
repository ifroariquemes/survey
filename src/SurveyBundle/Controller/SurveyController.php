<?php

namespace SurveyBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Tools\Pagination\Paginator;
use SurveyBundle\Entity\Survey;
use SurveyBundle\Form\SurveyType;

class SurveyController extends Controller {

    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction(Request $request) {
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
        $query = $qb->select('s')->from(Survey::class, 's')->orderBy('s.creation', 'DESC')->getQuery();
        $paginator = $this->get('knp_paginator');
        $surveys = $paginator->paginate(
                $query
                , $request->query->getInt('page', 1)
                , 10
        );

        return $this->render('survey/dashboard.html.twig', [
                    'user' => $this->getUser(),
                    'surveys' => $surveys
        ]);
    }

    /**
     * @Route("/add", name="survey_add")
     */
    public function add(Request $request) {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        $survey = new Survey();
        $form = $this->createForm(SurveyType::class, $survey);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($survey);
            $em->flush();
            return $this->render('survey/edit.confirm.html.twig', [
                        'user' => $this->getUser()
            ]);
        }
        return $this->render('survey/edit.html.twig', [
                    'user' => $this->getUser(),
                    'survey' => $survey,
                    'form' => $form->createView()
        ]);
    }

}
