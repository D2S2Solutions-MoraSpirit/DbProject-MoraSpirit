<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Controller\AchievementDBaccess;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller\StudentDBaccess;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $s_id=StudentDBaccess::getLastStudentID();
        return $this->render('applicationStudentBundle:Default:AddStudent.html.twig',array('s_id'=>$s_id));
    }

    public function viewItemAction()
    {
        return $this->render('applicationStudentBundle:Default:ViewAvailableItem.html.twig');
    }

    public function viewAchievementsAction()
    {
        $ach=AchievementDBaccess::getAllAchievements();
        return $this->render('applicationStudentBundle:Default:ViewAchievements.html.twig',array('ach'=>$ach));
    }



}
