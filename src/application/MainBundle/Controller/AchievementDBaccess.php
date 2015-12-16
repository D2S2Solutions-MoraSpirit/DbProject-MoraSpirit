<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 16/12/15
 * Time: 8:30 AM
 */


namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\resource as En;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity\Sport;

class AchievementDBaccess{
    public static function getAllSports(){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();


            $stm=$con->stmt_init();

            $stm->prepare("SELECT sport_id,name FROM Sport");
//           // $result = mysqli_query($con,$sql);
//
//
            $stm->execute();
            $result = $stm->get_result();
//

            $equipmentArray=array();


            while ($row = $result->fetch_assoc())
            {


                $eqOb=new Sport();
                $eqOb->setName($row["name"]);
                $eqOb->getSportId($row["sport_id"]);

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


}
