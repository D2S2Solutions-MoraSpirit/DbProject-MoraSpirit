<?php
namespace application\equipmentBundle\Controller;

use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;
class EquipmentTypeController extends Controller
{

    public static function getAllEquipmentTypes()
    {
        $eqList=cont\EquipmentDBacess::getAllEquipmentTypes();
        return $eqList;
        //return $this->render('applicationStudentBundle:Default:StudentRequest.html.twig',array('eqList'=>$eqList));
    }
}
