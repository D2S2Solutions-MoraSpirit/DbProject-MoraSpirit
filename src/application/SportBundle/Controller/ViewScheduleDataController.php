<<<<<<< HEAD
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
//        $resource_id=$_GET["resource_id"];
//        $resource=cont\PracticeScheduleDBAccess::getAllLocationSchedule($resource_id);
//        return new JsonResponse(['sport-id'=>$resource->getSportId(),'practise_date'=>$resource->getPractiseDate(),'practise_time'=>$resource->getPractiseTime(),'resource_id'=>$resource_id]);

    }
=======
<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:08 PM
 */

namespace application\SportBundle\Controller;

use application\MainBundle\Controller\PracticeScheduleDBAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ViewScheduleDataController extends Controller
{
    public function viewScheduleAction(){
        return $this->render('SportBundle:Default:index.html.twig');
    }
    public function viewScheduleGymAction(){

        $locationShedule=PracticeScheduleDBAccess::getAllLocationSchedule();
        return $this->render('SportBundle:Default:gymSchedule.html.twig',array(''));

    }
>>>>>>> 6ae794794e2e7d293622273171ea5bef4855a79c
}