<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:08 PM
 */

namespace application\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ViewScheduleDataController extends Controller
{
    public function viewScheduleAction(){
        return $this->render('SportBundle:Default:index.html.twig');
    }
    public function viewScheduleGymAction(){

    }
}