<<<<<<< HEAD
<?php

namespace application\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GymScheduleController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportBundle:Default:gymSchedule.html.twig');
    }
}
=======
<?php

namespace application\SportBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;

class GymScheduleController extends Controller
{
    public function indexAction()
    {
        //  $resource_id=$_GET["resource_id"];
        $resource_id = 1;
        $resource = cont\PracticeScheduleDBaccess::getAllLocationSchedule($resource_id);
        //$response=new JsonResponse(['sport-id'=>$resource->getSportId(),'practise_date'=>$resource->getPractiseDate(),'practise_time'=>$resource->getPractiseTime(),'resource_id'=>$resource_id]);
       // $response_array = array($resource->getSportId(), $resource->getPractiseDate(), $resource->getPractiseTime());
       // $response_array = array($resource);
        //$v=$resource[0];
       // echo $v.getSportId();
        return $this->render('SportBundle:Default:gymSchedule.html.twig', array('response_array' => $resource));
    }
}
>>>>>>> 6ae794794e2e7d293622273171ea5bef4855a79c
