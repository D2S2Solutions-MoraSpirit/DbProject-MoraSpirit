<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:12 PM
 */

namespace application\MainBundle\Controller;

use application\MainBundle\Resources\Entity\PracticeSchedule;
use application\MainBundle\Resources\Entity\Sport;
use application\MainBundle\Controller as cont;
class PracticeScheduleDBaccess
{
    public static function getAllLocationSchedule($resource_id)
    {
        $stm = null;
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();
            $stm = $con->stmt_init();
            $stm->prepare("SELECT sport_id,practiceDate,practiceStartTime,locationName,author,status,practiceEndTime FROM practiceschedule NATURAL JOIN location where location.resource_id=?");
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
                $practiceSchedule->setPractiseStartTime($row["practiceStartTime"]);
                $practiceSchedule->setResourceName($row["locationName"]);
                $practiceSchedule->setPractiseEndTime($row["practiceEndTime"]);
                $practiceSchedule->setAuthor($row["author"]);
                $practiceSchedule->setStatus($row["status"]);
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
    public static function saveScheduledEvent(practiceSchedule $practiceSchedule){
        $conn=connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql = $con->prepare("INSERT INTO practiceschedule VALUES (?,?,?,?,?,?,?)");
        $sportid=$practiceSchedule->getSportId();
        $resource_id=$practiceSchedule->getResourceId();
        $practiceDate=$practiceSchedule->getPractiseDate();
        $practiceStartTime=$practiceSchedule->getPractiseStartTime();
        $practiceEndTime=$practiceSchedule->getPractiseEndTime();
        $status=$practiceSchedule->getStatus();
        $author=$practiceSchedule->getAuthor();
        $sql->bind_param("sssssss", $sportid, $resource_id, $practiceDate, $practiceStartTime,$practiceEndTime,$author,$status);
        if ($sql->execute()==TRUE){
            return true;
        }else{
            return FALSE;
        }

    }
    public static function getAllSport(){
        $stm = null;
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();
            $stm = $con->stmt_init();
            $stm->prepare("select * from sport");
            $stm->execute();
            $result = $stm->get_result();
            $sportArray=array();
            while ($row = $result->fetch_assoc()) {
                $sport=new Sport();
                $sport->setSportId($row["sport_id"]);
                $sport->setName($row["name"]);
                $sportArray[]=$sport;
            }
            return $sportArray;

        }catch (Exception $e) {
            return "error";
        } finally {
            //$conn->close();
            //$stm->close();
        }
    }


}
