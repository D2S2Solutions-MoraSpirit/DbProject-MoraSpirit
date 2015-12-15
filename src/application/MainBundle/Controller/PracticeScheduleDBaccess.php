<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:12 PM
 */

namespace application\MainBundle\Controller;


use PracticeSchedule;

class PracticeScheduleDBAccess
{
    public static function getAllScheduleDetails(){
        $conn=connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql= $con->prepare("SELECT * FROM practiceschedule");
        $result=$sql->execute();
        $sql->bind_result($sport_id, $resource_id,$practise_date,$practise_time);
        $practiceSchedule =new PracticeSchedule();
        $array=array();
        while($sql->fetch()){
            $practiceSchedule =new PracticeSchedule();
            $practiceSchedule->setSportId($sport_id);
            $practiceSchedule->setResourceId($resource_id);
            $practiceSchedule->setPractiseDate($practise_date);
            $practiceSchedule->setPractiseTime($practise_time);
            $array[]=$practiceSchedule;
        }
        return $array;

    }
}