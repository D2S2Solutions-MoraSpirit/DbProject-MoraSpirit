<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-15
 * Time: PM 1:07
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\Sport;
use Symfony\Component\Config\Definition\Exception\Exception;

class SportDBaccess{
    public static function saveSport(Sport $sport){

        $conn = connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO Sport VALUES (?,?)");
        $sportid = $sport->getSportId();
        $sportname = $sport->getName();

        $sql->bind_param("ss",$sportid,$sportname);

        if ( $sql->execute()==TRUE) {
            echo "New record created successfully (sport added)";
        } else {
            //echo "Error in adding sport: " . $sql . "<br>" ;
            echo "Error in adding sport:";
        }
    }

    public static function getAllSports(){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();
            $stm=$con->stmt_init();
            $stm->prepare("SELECT name FROM Sport");
            $stm->execute();
            $result = $stm->get_result();
            $sportArray=array();
            $count=0;
            while ($row = $result->fetch_assoc())
            {
                $sport=new Sport();
                $sport->setName($row["name"]);
                $sportArray[]=$sport;
            }

            return $sportArray;
        }catch (Exception $e){
            return "error";
        }finally{
            //$conn->close();
            $stm->close();
        }
    }

    public static function getSport($id){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();
            $stm=$con->stmt_init();
            $stm->prepare("SELECT name FROM sport WHERE sport_id="+$id);
            $stm->execute();
            $result = $stm->get_result();
            echo 'ID: '.$result['name'].'<br>';
            return $result;
        }catch(Exception $e){
            return "error";
        }finally{

        }
    }
}