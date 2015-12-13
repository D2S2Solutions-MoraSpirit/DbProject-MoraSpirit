<?php

namespace application\StudentBundle\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;

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



}
