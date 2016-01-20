<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 1/18/2016
 * Time: 6:57 PM
 */

namespace application\SportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
class AddScheduleController extends Controller
{
    public function indexAction()
    {
        $r=cont\PracticeScheduleDBaccess::getAllSport();
        return $this->render('SportBundle:Default:addScheduledEvent.html.twig',array("sport"=>$r));
    }
}