<?php

namespace application\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;

class GroundScheduleController extends Controller
{
    public function indexAction()
    {
        $resource_id = 2;
        $resource = cont\PracticeScheduleDBaccess::getAllLocationSchedule($resource_id);
        return $this->render('SportBundle:Default:gymSchedule.html.twig', array('response_array' => $resource));

    }
}
