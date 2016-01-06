<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-17
 * Time: AM 8:29
 */

namespace application\MainBundle\Controller;


class CoachDBaccess
{
    public static function saveCoach(Coach $coach){

        $conn = connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO coach VALUES (?,?)");
        $sportid = $coach->getSportId();
        $sportname = $coach->getName();

        $sql->bind_param("ss",$sportid,$sportname);

        if ( $sql->execute()==TRUE) {
            echo "New record created successfully (coach added)";
        } else {
            echo "Error in adding sport: " . $sql . "<br>" ;
        }

    }
}