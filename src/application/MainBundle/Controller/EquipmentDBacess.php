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



        $quantity=$eqpm->getQuantity();
        $date= $eqpm->getDate();
        $name=$eqpm->getEquipmentName();
        $mysqltime = $eqpm->getDate();
        echo $mysqltime;

        $newsql = "insert into equipment Values('$r_id','$name','$quantity','$mysqltime')";
        if ( $con->query($newsql)==TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $newsql . "<br>" ;
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
                //echo ($eqOb->getEquipmentName());
                $equipmentArray[]=$eqOb;



            }

            return $equipmentArray;
        }catch (Exception $e){
            return "error";
        }finally{
            //$conn->close();
           // $stm->close();

        }
    }
    public static function updateEquipment(equipment $eq){
        $conn=connection::getConnectionObject();
        $con =$conn->getConnection();

        $qty=$eq->getQuantity();
        $date= $eq->getDate();
        $name =$eq->getEquipmentName();


        $sql = "UPDATE equipment  SET qty=qty+?, boughtDate=? WHERE equipmentName=?";

        $sql = $con->prepare($sql);
        $sql->bind_param('iss',$qty, $date,$name);


        $sql->execute();


        if ($sql->errno) {
            echo "FAILURE!!! " . $sql->error;
        }
        else echo "Updated {$sql->affected_rows} rows";


    }
    public static function getResourceID(equipment $eqpt){
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $name =$eqpt->getEquipmentName();
        $sql="SELECT resource_id FROM equipment where equipmentName=? ";
        $sql = $con->prepare($sql);
        $sql->bind_param('s',$name);


        $sql->execute();
        $result = $sql->get_result();



        $row=mysqli_fetch_row($result);

        $eqpt->setResourceId($row[0]);
        return $eqpt;


    }
    public static function updateResource(resource $rs){

        $conn=connection::getConnectionObject();
        $con =$conn->getConnection();
        $s_id =$rs->getSupplierId();
        $r_id=$rs->getResourceId();
     

        $sql = "UPDATE resource  SET supplierId=? WHERE resource_id=?";

        $sql = $con->prepare($sql);
        $sql->bind_param('ss',$s_id,$r_id );


        $sql->execute();


        if ($sql->errno) {
            echo "FAILURE!!! " . $sql->error;
        }
        else echo "Updated {$sql->affected_rows} rows";
    }

}