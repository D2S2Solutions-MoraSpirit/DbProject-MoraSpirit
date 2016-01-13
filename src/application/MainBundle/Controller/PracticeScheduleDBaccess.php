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

                $stm_sport = $con->stmt_init();
                $stm_sport->prepare("SELECT name FROM sport where sport.sport_id=?");
                $stm_sport->bind_param("s",$row["sport_id"] );
                $stm_sport->execute();
                $result_sport = $stm_sport->get_result();
                $row_sport = $result_sport->fetch_assoc();
                $practiceSchedule->setSportName($row_sport["name"]);
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
