<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 13/1/16
 * Time: 11:48 PM
 */

namespace application\MainBundle\Controller;


/*use Symfony\Component\HttpKernel\Tests\Controller;*/
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainTemplateController extends Controller{
    public function templateTestAction(){
        return $this->render('applicationMainBundle:Default:maintemplate.html.twig');
    }


    /*public function addCoachAction(){
        return $this->render('SportBundle:AddCoach:addcoach.html.twig');
    }*/


}
