<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/15/2015
 * Time: 8:49 PM
 */

namespace application\StudentBundle\Controller;
use application\equipmentBundle\Controller\EquipmentTypeController;
use application\equipmentBundle\Controller\formController;
use application\MainBundle\Controller\EquipmentDBacess;
use application\MainBundle\Controller\LocationDBaccess;
use application\MainBundle\Resources\Entity\Request;
use application\MainBundle\Resources\Entity\RequestResource;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Date;

class StudentRequestController extends Controller
{
    public function indexAction()
    {
        //$sportList=SportDBaccess::getAllSports();
        $eqList=formController::getAllEqupiments();
        $locationList=LocationDBaccess::getAllLocations();
        return $this->render('applicationStudentBundle:Default:StudentRequest.html.twig',array('eqList'=>$eqList,'locationList'=>$locationList));
    }


    public function addStudentRequestAction(){
        $student_id=$_GET["student_id"];
        $request_id=$_GET["request_id"];
        $tableList=$_GET["tableList"];

        $request=new Request();
        $request->setRequestId($request_id);
        $request->setStudentId($student_id);
        $request->setRequestDate(new Date());


        $resourcesArray=array();
        //$tableList =json_decode($tableList);
        $cout=0;
        for ($x = 0; $x < count($tableList) ; $x+=1) {
            $cout++;
            $requestResource=new RequestResource();
            $requestResource->setRequestId($request_id);
            $requestResource->setResourceId($tableList[$x][0]);
            $requestResource->setItemBorrowingDate($tableList[$x][2]);
            $requestResource->setReturnDate($tableList[$x][3]);
            $resourcesArray[]=$requestResource;
        }



        return new JsonResponse(['name'=>$resourcesArray]);
    }
}

?>