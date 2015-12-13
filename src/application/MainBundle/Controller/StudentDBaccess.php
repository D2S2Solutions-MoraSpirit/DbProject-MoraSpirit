<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 11:18 AM
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\Student;

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


    public static function addSportInvolve(){

    }
}