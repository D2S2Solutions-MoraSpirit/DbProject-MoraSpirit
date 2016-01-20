<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 17/1/16
 * Time: 11:07 AM
 */
namespace application\MainBundle\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity\Supplier;
class SupplierDBacess{
    public static function getLastSupplierID()
    {
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql="SELECT max(supplierId) FROM supplier";

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
    public static function saveToSupplier(Supplier $spp)
    {
        $conn = cont\connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO Supplier VALUES (?,?,?,? )");
        $supplierId = $spp->getSupplierId();
        $name = $spp->getName();
        $contactNo = $spp->getContactNo();
        $Nic = $spp->getNic();


        $sql->bind_param("ssss", $supplierId,$name,$contactNo,$Nic);
        if ($sql->execute() == TRUE) {
            echo "New record created successfully";
            return true;
        } else {
            echo "not working";
            echo "Error: " . $sql . "<br>";
            return false;
        }
    }

}