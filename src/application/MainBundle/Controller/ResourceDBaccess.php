<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-16
 * Time: AM 1:33
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\resource;
use application\MainBundle\Controller as cont;

class ResourceDBaccess
{
    public static function addResource(resource $rs)
    {

        $conn = connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO resource VALUES (?,?)");

        $resid=$rs->getResourceId();
        $supid=$rs->getSupplierId();


        $sql->bind_param("ss",$resid,$supid);


        if ( $sql->execute()==TRUE) {
            echo "New record created successfully in RESOURCE table";
        } else {
            echo "Error in resource adding: <br>" ;
        }



    }
}