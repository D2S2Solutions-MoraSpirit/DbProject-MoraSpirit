<?php

namespace application\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportBundle:Default:index.html.twig');
    }

    public function addSportAction(){
        return $this->render('SportBundle:AddSport:addSport.html.twig');
    }
}
