<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 11/12/15
 * Time: 5:23 AM
 */
namespace application\MainBundle\Controller;
use mysqli;
use application\MainBundle\Controller as cont;
use  application\MainBundle\Resources\Entity\equipment;
class EquipmentDBacess{

    public static function saveToEquipment(equipment $eqpm)
    {
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $r_id = $eqpm->getResource_id();
        $s_id = $eqpm->getSupplier_id();
        echo $r_id ."<br>";
        echo $s_id  ."<br>";
        $sql = "INSERT INTO resource VALUES ( '$r_id'  , '$s_id' ) ";



        if ( $con->query($sql)==TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" ;
        }


    }
}