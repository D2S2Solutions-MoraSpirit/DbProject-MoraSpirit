<?php
namespace application\equipmentBundle\Controller;

use application\MainBundle\Resources\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;
class formController extends Controller
{
    public function addAction()

    {
        $r=cont\EquipmentDBacess::getLastResourceID();
        return $this->render('applicationequipmentBundle:Forms:Add_equipment_form.html.twig',array('s' => $r));
    }
    public function saveEquipmentAction()
    {
        $eqpm = new en\equipment();
        $rs = new en\resource();
        $eqpm->setResourceId($_POST["resource_id"]);
        $eqpm->setTypeId($_POST["equipment_type"]);
        $eqpm->setQuantity($_POST["quantity"]);
        $eqpm->setDate($_POST["Date"]);
        $rs->setResourceId($_POST["resource_id"]);
        $rs->setSupplierId($_POST["supplier_id"]);
        cont\EquipmentDBacess::saveToEquipment($eqpm,$rs);



        return $this->render('applicationMainBundle:Default:index.html.twig');
    }
}
