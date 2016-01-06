<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 16/12/15
 * Time: 8:30 AM
 */


namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\Achievement;
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
                $eqOb->setSportId($row["sport_id"]);

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
    public static function saveToAchievement(Achievement $achievement){
        $conn = cont\connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO achievement VALUES (?,?,?,? )");
        $sport_id=$achievement->getSportId();
        $achievement_id=$achievement->getAchievementId();
        $description=$achievement->getDescription();
        $date=$achievement->getDate();
        echo $sport_id;
        echo $achievement_id;
        echo $description;
        echo $date;
        $sql->bind_param("ssss",$sport_id,$achievement_id ,$description ,$date );

        $sql->execute();


        if ($sql->errno) {
            echo "FAILURE!!! " . $sql->error;
        }
        else echo "Updated {$sql->affected_rows} rows";


    }


}
