<?php
namespace application\equipmentBundle\Controller;

use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity\equipment;
class formController extends Controller
{
    public function addAction()
    {
        return $this->render('applicationequipmentBundle:Forms:Add_equipment_form.html.twig');
    }
    public function saveEquipmentAction()
    {
        $eqpm = new Entity\equipment();
        $eqpm->setResource_id($_POST["rid"]);
        $eqpm->setSupplier_id($_POST["sid"]);
        cont\DBacess::saveToEquipment($eqpm);



        return $this->render('applicationMainBundle:Default:index.html.twig');
    }
}
