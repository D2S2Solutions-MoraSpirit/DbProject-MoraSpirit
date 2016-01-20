<<<<<<< HEAD
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
use application\MainBundle\Resources\Entity\SportInvolve;
use application\MainBundle\Resources\Entity\Student;
use application\MainBundle\Resources\Entity\StudentContact;
use Symfony\Component\Config\Definition\Exception\Exception;

class StudentDBaccess
{

    public static function addStudent(Student $student,array $telArray)
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



                foreach($telArray as $value){
                    $isadded=StudentDBaccess::addStudentContact($con,$value);
                    if($isadded==false){
                        echo "error while adding contact";
                        $con->rollback();
                        return false;
                    }
                }
                $con->commit();
                echo "New record created successfully";
                return true;
            } else {
                $con->rollback();
                echo "error bbb"; //echo "Error: " . $sql . "<br>";
                return false;

            }

        } catch (Exception $e) {
            $con->rollback();
            return "error while adding";
        } finally {
            $con->autocommit(true);

           // $sql->close();
            $con->close();
        }


    }

    public static function addStudentContact($con,StudentContact $studentContact){


        $sql = $con->prepare("INSERT INTO StudentContact VALUES (?,?)");
        $studentId= $studentContact->getStudentId();
        $contactNo= $studentContact->getContactNo();

        $sql->bind_param("ss",$studentId,$contactNo);


        if ($sql->execute() == TRUE) {

            //echo "New record created successfully";
            return true;
        } else {

            echo "error"; //echo "Error: " . $sql . "<br>";
            return false;

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


    public static function addSportInvolve(SportInvolve $sportInvolve)
    {
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();

            $sql = $con->prepare("INSERT INTO sportinvolve VALUES (?,?,?,?,?,? )");


            $studentId = $student->getStudentId();
            $name = $student->getName();
            $faculty = $student->getFaculty();
            $batch = $student->getBatch();
            $address = $student->getAddress();
            $nic = $student->getNic();

            $sql->bind_param("ssssss", $studentId, $name, $batch, $faculty, $address, $nic);


            if ($sql->execute() == TRUE) {

                echo "New record created successfully";
                return true;
            } else {

                echo "error"; //echo "Error: " . $sql . "<br>";
                return false;

            }

        } catch (Exception $e) {
            return "error";
        } finally {
            //$sql->close();
            $con->close();
        }

    }






=======
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
use application\MainBundle\Resources\Entity\Student;
use Symfony\Component\Config\Definition\Exception\Exception;

class StudentDBaccess
{

    public static function addStudent(Student $student)
    {

        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();

            $sql = $con->prepare("INSERT INTO Student VALUES (?,?,?,?,?,? )");


            $studentId = $student->getStudentId();
            $name = $student->getName();
            $faculty = $student->getFaculty();
            $batch = $student->getBatch();
            $address = $student->getAddress();
            $nic = $student->getNic();

            $sql->bind_param("ssssss", $studentId, $name, $batch, $faculty, $address, $nic);


            if ($sql->execute() == TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>";
            }
            return true;
        } catch (Exception $e) {
            return "error";
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


    public static function addSportInvolve()
    {

    }
    public static function getLastStudentID()
    {
        $conn = connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql="SELECT max(student_id) FROM student";

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






>>>>>>> 66d486d01253d6575dffd1cc30354441d7b77312
}