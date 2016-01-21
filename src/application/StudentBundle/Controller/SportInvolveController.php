<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 2:58 PM
 */

namespace application\StudentBundle\Controller;


use application\MainBundle\Controller\SportDBaccess;
use application\MainBundle\Controller\StudentDBaccess;
use application\MainBundle\Resources\Entity\SportInvolve;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Resources\Entity;
use Symfony\Component\HttpFoundation\JsonResponse;

class SportInvolveController extends Controller
{


    public function indexAction()
    {
        $sportList = SportDBaccess::getAllSports();
        return $this->render('applicationStudentBundle:Default:AddStudentSPD.html.twig', array('sportList' => ($sportList)));
    }

    public function addSportInvolveAction()
    {
        $studentSP = new Entity\SportInvolve();
        $studentSP->setSportId($_GET["sportId"]);
        $studentSP->setStudentId($_GET["student_id"]);
        $studentSP->setIsActive( $_GET["status"]);
        $studentSP->setRole( $_GET["role"]);

        $status=StudentDBaccess::addSportInvolveDetails($studentSP);
        return new JsonResponse(['status'=>$status]);
    }
}