<?php

namespace application\SportBundle\Controller;

use application\MainBundle\Controller\SportDBaccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportBundle:Default:index.html.twig');
    }

    public function addSportAction(){
        return $this->render('SportBundle:AddSport:addSport.html.twig');
    }

    public function saveSportAction(){
        $spr = new en\Sport();

        $spr->setName($_POST["sportname"]);
        $spr->setSportId($_POST["sportid"]);

        cont\SportDBaccess::saveSport($spr);
        return $this->render('SportBundle:Message:dbsave.html.twig');

    }
}
