<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 11:18 AM
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\Student;
use Symfony\Component\Config\Definition\Exception\Exception;

class StudentDBaccess
{

    public static function addStudent(Student $student){


        $conn=connection::getConnectionObject();
        $con =$conn->getConnection();

        $sql = $con->prepare("INSERT INTO Student VALUES (?,?,?,?,?,? )");


        $studentId=$student->getStudentId();
        $name=$student->getName();
        $faculty=$student->getFaculty();
        $batch=$student->getBatch();
        $address=$student->getAddress();
        $nic=$student->getNic();

        $sql->bind_param("ssssss",$studentId,$name,$batch,$faculty,$address,$nic );



        if ( $sql->execute()==TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" ;
        }
    }

    public static function getStudentDetails($student_id){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();

            $stm=$con->stmt_init();

            $stm->prepare("SELECT name,batch,faculty FROM Student where student_id=?");
            $stm->bind_param("s",$student_id);
           // $result = mysqli_query($con,$sql);


            $stm->execute();
            $result = $stm->get_result();

            $student=new Student();

            while ($row = $result->fetch_array(MYSQLI_NUM))
            {
                $student->setName($row["name"]);
                $student->setFaculty($row["faculty"]);
                $student->setBatch($row["batch"]);;
            }


            return $student_id;
        }catch (Exception $e){
            return "error";
        }finally{
            $conn->close();
            $stm->close();
        }



    }


    public static function addSportInvolve(){

    }
}