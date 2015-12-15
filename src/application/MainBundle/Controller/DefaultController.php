<?php

namespace application\MainBundle\Controller;
use application\StudentBundle\Resources\Entity;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //$student=new Entity\Student();
        return $this->render('applicationMainBundle:Default:index.html.twig');
    }
}
