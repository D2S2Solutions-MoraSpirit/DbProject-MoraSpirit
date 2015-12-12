<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $student=new Entity\Student();
        $student->getId();
        return $this->render('applicationStudentBundle:Default:index.html.twig');
    }
}
