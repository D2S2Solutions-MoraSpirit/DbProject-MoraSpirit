<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;


class AchievementController extends Controller
{
    public function indexAction()
    {
        $sport =cont\AchievementDBaccess::getAllSports();
        return $this->render('applicationStudentBundle:Achievement:AddAchievement.html.twig',array("sport"=>$sport));
    }
    public function addStudentAction()
    {
        $sport_id=$_POST["Sport"];
        $achievement_id=$_POST["achievement_id"];
        $description=$_POST["description"];

        $date=$_POST["date"];
        $achievement = new Entity\Achievement();
        $achievement->setDate($date);
        $achievement->setAchievementId($achievement_id);
        $achievement->setDescription($description);
        $achievement->setSportId($sport_id);
        cont\AchievementDBaccess::saveToAchievement($achievement);
        return $this->render('applicationStudentBundle:Default:index.html.twig');

    }



}