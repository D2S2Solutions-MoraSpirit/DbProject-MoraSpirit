<<<<<<< HEAD
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
=======
<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:12 PM
 */

namespace application\MainBundle\Controller;

use application\MainBundle\Resources\Entity\PracticeSchedule;

class PracticeScheduleDBaccess
{
    public static function getAllLocationSchedule($resource_id)
    {
        $stm = null;
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();
            $stm = $con->stmt_init();
            $stm->prepare("SELECT sport_id,practiceDate,practiceTime,locationName FROM practiceschedule NATURAL JOIN location where location.resource_id=?");
            $stm->bind_param("s", $resource_id);
            $stm->execute();
            $result = $stm->get_result();

            $practiceScheduleArray = array();
            while ($row = $result->fetch_assoc()) {
                $practiceSchedule = new PracticeSchedule();
                $practiceSchedule->setSportId($row["sport_id"]);
                $practiceSchedule->setPractiseDate($row["practiceDate"]);
                $practiceSchedule->setPractiseTime($row["practiceTime"]);
                $practiceSchedule->setResourceName($row["locationName"]);
                $practiceScheduleArray[]=$practiceSchedule;
                //array_push($practiceScheduleArray, );
            }

            return $practiceScheduleArray;
        } catch (Exception $e) {
            return "error";
        } finally {
            //$conn->close();
            //$stm->close();
        }

    }


}
>>>>>>> 6ae794794e2e7d293622273171ea5bef4855a79c
