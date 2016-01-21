<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 1/21/2016
 * Time: 8:58 AM
 */

namespace application\SportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
class newGymController extends Controller
{
    public function indexAction()
{
    //  $resource_id=$_GET["resource_id"];
    $resource_id = 3;
    $resource = cont\PracticeScheduleDBaccess::getAllLocationSchedule($resource_id);


    //$response=new JsonResponse(['sport-id'=>$resource->getSportId(),'practise_date'=>$resource->getPractiseDate(),'practise_time'=>$resource->getPractiseTime(),'resource_id'=>$resource_id]);
    // $response_array = array($resource->getSportId(), $resource->getPractiseDate(), $resource->getPractiseTime());
    // $response_array = array($resource);
    //$v=$resource[0];
    // echo $v.getSportId();
    return $this->render('SportBundle:Default:newGymSchedule.html.twig', array('response_array' => $resource,));
}

}