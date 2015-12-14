<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
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

        cont\StudentDBaccess::addStudent($student);
        return $this->render('applicationMainBundle:Default:index.html.twig');
    }

    public function getStudentDetailsAction(){
        $student_id="S-0001";
        $student=cont\StudentDBaccess::getStudentDetails($student_id);
        //$data=new Entity\Student();
        //$faculty=$data->getFaculty();
        return new Response($student->getFaculty());

    }






}
