<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 1/20/2016
 * Time: 2:02 PM
 */

namespace application\SportBundle\Controller;
use application\MainBundle\Resources\Entity as en;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;

class SaveEventRequestController extends Controller
{
    public function indexAction(){
        $practiceSchedule= new en/PracticeSchedule();
        $practiceSchedule->setSportId($_POST["sport"]);
        $practiceSchedule->setResourceId($_POST["location"]);
        $practiceSchedule->setPractiseDate($_POST["date"]+"-"+$_POST["month"]+"2016");
        $practiceSchedule->setPracticeStartTime($_POST["start_hour"].":".$_POST["start_minutes"].":00");
        $practiceSchedule->setPracticeEndTime($_POST["end_hour"].":".$_POST["end_minutes"].":00");
        $practiceSchedule->setAuthor($_POST["author"]);
        $practiceSchedule->setStatus("Active");
        $isEventAdded=cont\PracticeSchedule::saveScheduledEvent($practiceSchedule);
        if($isEventAdded){
            return $this->render('SportBundle:Default:success.html.twig');
        }else{

        }
    }

}