<?php

namespace application\SportBundle\Controller;


use application\MainBundle\Controller\SportDBaccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;

class SportController extends Controller
{

    public function getAllSportsAction(){

        $sportArray[]=SportDBaccess::getAllSports();
        return $this->render('SportBundle:Default:viewsport.html.twig',array('s'=>$sportArray));

    }
    
    public function addSportAction(){
        return $this->render('SportBundle:AddSport:addSport.html.twig');
    }

    public function saveSportAction(){
        $spr = new en\Sport();
        $sportName = $_POST["sportname"];
        $sportId = $_POST["sportid"];
        if ($sportName==NULL){
            echo "Please enter valid a Sport Name";
            return $this->render('SportBundle:AddSport:addSport.html.twig');
        }
        else{
            $spr->setName($sportName);
            $spr->setSportId($sportId);

            cont\SportDBaccess::saveSport($spr);
            return $this->render('SportBundle:Message:dbsave.html.twig');    
        }
        

    }
}