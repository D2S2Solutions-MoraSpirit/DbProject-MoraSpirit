<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:12 PM
 */

namespace application\MainBundle\Controller;

use application\MainBundle\Resources\Entity\PracticeSchedule;

class PracticeScheduleDBAccess
{
    public static function getAllScheduleDetails(){

    }
    public static function getAllLocationSchedule($resource_id){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();
            $stm=$con->stmt_init();
            $stm->prepare("SELECT practiceschedule.sport_id,practiceschedule.practiceDate,practiceschedule.practiceTime FROM practiceschedule where practiceschedule.resource_id=?");
            $stm->bind_param("s",$resource_id);
//           // $result = mysqli_query($con,$sql);
            $stm->execute();
            $result = $stm->get_result();
            $practiceSchedule=new PracticeSchedule();
            while ($row = $result->fetch_assoc())
            {
                $practiceSchedule->setSportId($row["sport_id"]);
                $practiceSchedule->setPractiseDate($row["practiceDate"]);
                $practiceSchedule->setPractiseTime($row["practiceTime"]);
            }

            return $practiceSchedule;
        }catch (Exception $e){
            return "error";
        }finally{
            //$conn->close();
            $stm->close();
        }

    }



}
