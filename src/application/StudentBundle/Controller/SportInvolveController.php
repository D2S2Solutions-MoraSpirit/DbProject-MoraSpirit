<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 2:58 PM
 */

namespace application\StudentBundle\Controller;


use application\MainBundle\Resources\Entity\SportInvolve;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Resources\Entity;

class SportInvolveController extends Controller
{


    public function indexAction()
    {
        return $this->render('applicationStudentBundle:Default:AddStudentSPD.html.twig');
    }

    public function addSportInvolveAction(SportInvolve $sportInvolve){

    }
}