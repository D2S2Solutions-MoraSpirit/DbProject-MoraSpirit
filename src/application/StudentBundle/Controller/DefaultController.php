<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('applicationStudentBundle:Default:AddStudent.html.twig');
    }



}
