<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;

use application\MainBundle\Controller as cont;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('applicationStudentBundle:Default:AddStudent.html.twig');
    }



}