<?php

namespace application\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GymScheduleController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportBundle:Default:gymSchedule.html.twig');
    }
}
