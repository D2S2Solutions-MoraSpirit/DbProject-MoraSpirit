<?php

namespace application\equipmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('applicationequipmentBundle:Default:index.html.twig');
    }
    public function addEquipFormAction(){
        return $this->render('applicationequipmentBundle:Forms:Add_equipment_form.html.twig');
    }
}
