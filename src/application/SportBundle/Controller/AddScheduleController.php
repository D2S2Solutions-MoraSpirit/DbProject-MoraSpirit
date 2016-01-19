<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 1/18/2016
 * Time: 6:57 PM
 */

namespace application\SportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddScheduleController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportBundle:Default:addScheduledEvent.html.twig');
    }
}