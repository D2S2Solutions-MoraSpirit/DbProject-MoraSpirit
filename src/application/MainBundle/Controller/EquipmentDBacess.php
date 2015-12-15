<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 11/12/15
 * Time: 5:23 AM
 */
namespace application\MainBundle\Controller;
use application\MainBundle\Resources\Entity\EquipmentType;
use application\MainBundle\Resources\Entity\resource;
use mysqli;
use application\MainBundle\Controller as cont;
use  application\MainBundle\Resources\Entity\equipment;
use  application\MainBundle\Resources\Entity\requestResourceDamage;

class EquipmentDBacess{

    public static function saveToEquipment(equipment $eqpm,resource $rs)
    {
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $r_id = $eqpm->getResourceID();
        $s_id = $rs->getSupplierID();
        $sql = $con->prepare("INSERT INTO equipment VALUES (?,? )");
        $sql = "INSERT INTO resource VALUES ( '$r_id'  , '$s_id' ) ";



        if ( $con->query($sql)==TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" ;
        }
        $t_name=$eqpm->getTypeId();
        $sql2="select type_id from EquipmentType where '$t_name'=equipmentName";
        $result=mysqli_query($con,$sql2);
        $row=mysqli_fetch_row($result);
        $quantity=$eqpm->getQuantity();
        $date= $eqpm->getDate();
        $mysqltime = date('Y-m-d', strtotime(str_replace('-','/', $date)));

        $newsql = "insert into equipment Values('$r_id',$row[0],$quantity,$mysqltime)";
        if ( $con->query($newsql)==TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" ;
        }


    }
    public static function getLastResourceID()
    {
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql="SELECT max(resource_id) FROM resource";

        if ($result=mysqli_query($con,$sql))
        {
            $row=mysqli_fetch_row($result);
            if($row[0]==null){
               $r = 0;

            }
            else{
                $r= $row[0];
            }

            mysqli_free_result($result);
        }
        return $r+1;

    }

    public static function saveToRequestResourceDamage(requestResourceDamage $rsd)
    {
        $conn = cont\connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO requestresourcedamage VALUES (?,?,?,? )");
        $resource_id = $rsd->getResourceId();
        $request_id = $rsd->getRequestId();
        $borrow_date = $rsd->getBorrowingDate();
        $description = $rsd->getDescription();


        $sql->bind_param("ssss", $resource_id, $request_id, $borrow_date, $description);
        if ($sql->execute() == TRUE) {
            echo "New record created successfully";
        } else {
            echo "not working";
            echo "Error: " . $sql . "<br>";
        }
    }

    public static function getAllEquipmentTypes(){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();


            $stm=$con->stmt_init();

            $stm->prepare("SELECT equipmentName,resource_id FROM Equipment");
//           // $result = mysqli_query($con,$sql);
//
//
            $stm->execute();
            $result = $stm->get_result();
//

            $equipmentArray=array();


            while ($row = $result->fetch_assoc())
            {
                $eqOb=new Equipment();
                $eqOb->setEquipmentName($row["equipmentName"]);
                $eqOb->setResourceId($row["resource_id"]);
                $equipmentArray[]=$eqOb;
            }

            return $equipmentArray;
        }catch (Exception $e){
            return "error";
        }finally{
            //$conn->close();
            $stm->close();

        }
    }

}