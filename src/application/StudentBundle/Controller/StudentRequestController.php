<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/15/2015
 * Time: 8:49 PM
 */

namespace application\StudentBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentRequestController extends Controller
{
    public function indexAction()
    {
        //$sportList=SportDBaccess::getAllSports();
        return $this->render('applicationStudentBundle:Default:StudentRequest.html.twig');
    }
}

?>