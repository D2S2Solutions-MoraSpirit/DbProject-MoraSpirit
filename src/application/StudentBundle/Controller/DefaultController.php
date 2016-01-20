<?php

namespace application\StudentBundle\Controller;
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



}
