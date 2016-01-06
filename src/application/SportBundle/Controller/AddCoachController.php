<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-17
 * Time: AM 8:26
 */

namespace application\SportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddCoachController extends Controller
{
    public function addCoachAction(){
        return $this->render('SportBundle:AddCoach:addcoach.html.twig');
    }

}