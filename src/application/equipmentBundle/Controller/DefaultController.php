<?php

namespace application\equipmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('applicationequipmentBundle:Default:index.html.twig');
    }
    public function addEquipFormAction(){
        return $this->render('applicationequipmentBundle:Forms:Add_equipment_form.html.twig');
    }
    public function viewAllEquipmentsAction(){
        $eqps= cont\EquipmentDBacess::getAllEquipments();
        return $this->render('applicationequipmentBundle:Default:viewAllResources.html.twig',array('s'=>$eqps));
    }
}
