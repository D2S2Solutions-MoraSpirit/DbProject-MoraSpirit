<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-15
 * Time: PM 2:20
 */

namespace application\SportBundle\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AddSportFormController extends Controller
{
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