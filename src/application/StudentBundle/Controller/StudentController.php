<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function addStudentAction()
    {
        $student = new Entity\Student();
        $student->setStudentId($_POST["student_id"]);
        $student->setName($_POST["name"]);
        $student->setFaculty($_POST["faculty"]);
        $student->setBatch($_POST["batch"]);
        $student->setAddress($_POST["address"]);
        $student->setNic($_POST["nic"]);


        $telArray=array();
        for($x=0;$x< $_POST["hiddenText"];$x++){
            $contact=new Entity\StudentContact();
            $contact->setStudentId($_POST["student_id"]);
            $contact->setContactNo($_POST["telephone"][$x]);
            $telArray[]=$contact;
        }
        //$v=$telArray[1];
        //echo $v->getContactNo();
        cont\StudentDBaccess::addStudent($student,$telArray);
        return $this->render('applicationMainBundle:Default:index.html.twig');
    }

    public function getStudentDetailsAction(){
        $student_id=$_GET["student_id"];
        $student=cont\StudentDBaccess::getStudentDetails($student_id);
        return new JsonResponse(['name'=>$student->getName(),'faculty'=>$student->getFaculty(),'batch'=>$student->getBatch()]);

    }

}
