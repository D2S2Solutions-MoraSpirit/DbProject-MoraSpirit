<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-15
 * Time: PM 10:25
 */

namespace application\MainBundle\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity\Location;


class LocationDBaccess
{
    public static function getLastResourceID()
    {
        $conn = cont\connection::getConnectionObject();
        $con = $conn->getConnection();
        $sql = "SELECT max(resource_id) FROM resource";

        if ($result = mysqli_query($con, $sql)) {
            $row = mysqli_fetch_row($result);
            if ($row[0] == null) {
                $r = 0;

            } else {
                $r = $row[0];
            }

            mysqli_free_result($result);
        }
        return $r + 1;
    }

    public static function addLocation(Location $location)
    {
        $conn = connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO location VALUES (?,?,?,?)");

        $resid=$location->getResourceid();
        $locname=$location->getName();
        $seslim =$location->getSession();
        $loctype=$location->getType();

        $sql->bind_param("ssss",$resid,$locname,$seslim,$loctype);


        if ( $sql->execute()==TRUE) {
            echo "New record created successfully in LOCATION table";
        } else {
            echo "Error in location adding: " . $sql . "<br>" ;
        }



    }
}