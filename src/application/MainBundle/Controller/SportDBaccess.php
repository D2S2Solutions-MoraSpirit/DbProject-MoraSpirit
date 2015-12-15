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

        $sql = $con->prepare("INSERT INTO sport VALUES (?,?)");
        $sportid = $sport->getSportId();
        $sportname = $sport->getName();

        $sql->bind_param("ss",$sportid,$sportname);

        if ( $sql->execute()==TRUE) {
            echo "New record created successfully (sport added)";
        } else {
            echo "Error in adding sport: " . $sql . "<br>" ;
        }

    }
}