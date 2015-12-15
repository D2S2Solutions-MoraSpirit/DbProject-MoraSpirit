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

        $r=cont\EquipmentDBacess::getAllEquipmentTypes();

        return $this->render('applicationequipmentBundle:Forms:Add_equipment_form.html.twig',array('s' => $r));
    }
    public function saveEquipmentAction()
    {
        $eqpm = new en\equipment();

        $eqpm->setEquipmentName($_POST["equipmentName"]);
        $eqpm->setDate($_POST["Date"]);
        $eqpm->setQuantity($_POST["quantity"]);



        cont\EquipmentDBacess::updateEquipment($eqpm);



        return $this->render('applicationMainBundle:Default:index.html.twig');
    }
    public function damageReportAction()
    {
        $damage = new en\requestResourceDamage();
        $damage->setResourceId($_POST["resource_id"]);
        $damage->setRequestId($_POST["request_id"]);
        $damage->setBorrowingDate($_POST["borrow_date"]);

      $damage->setDescription($_POST["description"]);
        cont\EquipmentDBacess::saveToRequestResourceDamage($damage);

        return $this->render('applicationMainBundle:Default:index.html.twig');



    }
    public function damageViewAction()
    {
        $request_id ='1';
        $resource_id='1';
        $borrowDate="2015-12-16";
        return $this->render('applicationequipmentBundle:Forms:reportDamage_form.html.twig',array('request_id' => $request_id,'resource_id'=>$resource_id,'borrow_date'=>$borrowDate));


    }

    public static function getAllEqupiments(){
        return cont\EquipmentDBacess::getAllEquipmentTypes();
    }
}
