<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 11:18 AM
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\Request;
use application\MainBundle\Resources\Entity\RequestResource;
use application\MainBundle\Resources\Entity\Sport;
use application\MainBundle\Resources\Entity\SportInvolve;
use application\MainBundle\Resources\Entity\Student;
use application\MainBundle\Resources\Entity\StudentContact;
use Symfony\Component\Config\Definition\Exception\Exception;

class StudentDBaccess
{

    public static function addStudent(Student $student, array $contact)
    {

        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();
            $con->autocommit(false);

            $sql = $con->prepare("INSERT INTO Student VALUES (?,?,?,?,?,? )");


            $studentId = $student->getStudentId();
            $name = $student->getName();
            $faculty = $student->getFaculty();
            $batch = $student->getBatch();
            $address = $student->getAddress();
            $nic = $student->getNic();


            $sql->bind_param("ssssss", $studentId, $name, $batch, $faculty, $address, $nic);


            if ($sql->execute() == TRUE) {

                foreach ($contact as $value) {
                    $isAdded = StudentDBaccess::addStudentContact($con, $studentId, $value);
                    if ($isAdded == false) {
                        $con->rollback();
                        return false;
                    }
                }
                $con->commit();
                return true;

            } else {
                $con->rollback();
                return false;
                // echo "Error: " . $sql . "<br>";
            }

        } catch (Exception $e) {
            $con->rollback();
            return false;
        } finally {
            $con->close();
        }


    }

    public static function getStudentDetails($student_id)
    {
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();


            $stm = $con->stmt_init();

            $stm->prepare("SELECT name,batch,faculty FROM Student where student_id=?");
            $stm->bind_param("s", $student_id);
//           // $result = mysqli_query($con,$sql);
//
//
            $stm->execute();
            $result = $stm->get_result();
//
            $student = new Student();
//
            while ($row = $result->fetch_assoc()) {
                $student->setName($row["name"]);
                $student->setFaculty($row["faculty"]);
                $student->setBatch($row["batch"]);;
            }

            return $student;
        } catch (Exception $e) {
            return "error";
        } finally {
            //$conn->close();
            $stm->close();
        }

    }


    public static function addSportInvolveDetails(SportInvolve $sportInvolve)
    {
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();

            $sql = $con->prepare("INSERT INTO SportInvolve VALUES (?,?,?,?)");


            $studentId = $sportInvolve->getStudentId();
            $sportId = $sportInvolve->getSportId();
            $status = $sportInvolve->getIsActive();
            $role = $sportInvolve->getRole();

            $sql->bind_param("ssis", $studentId, $sportId, $status, $role);


            if ($sql->execute() == TRUE) {
                echo "New record created successfully";
                return true;
            } else {
                //echo "Error: " . $sql . "<br>";
                return false;
            }

        } catch (Exception $e) {
            return false;
        } finally {
            $con->close();
        }
    }

    public static function getLastStudentID()
    {
        $conn = connection::getConnectionObject();
        $con = $conn->getConnection();
        $sql = "SELECT student_id FROM student ORDER BY student_id DESC limit 1";

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


    public static function addStudentContact($con, $studentId, StudentContact $contact)
    {

        try {


            //echo "thiss";
            $sql = $con->prepare("INSERT INTO studentcontact VALUES (?,?)");

            $cont = $contact->getContactNo();
            //$cont="222";
            //echo $cont;

            $sql->bind_param("ss", $studentId, $cont);


            if ($sql->execute() == TRUE) {

                return true;
            } else {
                return false;
            }
        } catch (Exception $w) {
            return false;
        }

    }

}






