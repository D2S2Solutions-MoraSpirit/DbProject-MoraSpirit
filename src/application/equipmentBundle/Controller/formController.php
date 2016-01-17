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
        $eqpm->setDate($_POST["date"]);
        $eqpm->setQuantity($_POST["quantity"]);
        $rs=new en\resource();
        $rs->setResourceId($eqpm->getResourceId());
        $rs->setSupplierId($_POST["supplierId"]);


        $eqpm=cont\EquipmentDBacess::getResourceID($eqpm);
        $rs->setResourceId($eqpm->getResourceId());
        echo $_POST["equipmentName"];
        echo " <br>";
        $updateEquip=cont\EquipmentDBacess::updateEquipment($eqpm);
        $updateRes=cont\EquipmentDBacess::updateResource($rs);
        if($updateEquip && $updateRes){
            return $this->render('applicationequipmentBundle:Forms:addedSuccessfullyMessage.html.twig');
        }
        else{
            echo "updated resources "+$updateRes;
            echo "updated equipment "+$updateEquip;
        }




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
    public function addNewEquipmentAction(){
            $id =cont\EquipmentDBacess::getLastResourceID();
        echo $id;

        return $this->render('applicationequipmentBundle:Forms:add_new_equipment.html.twig',array('new_id'=>$id));
    }
    public function addNewEquipmentSaveAction(){
        $eqpm = new en\equipment();

        $eqpm->setEquipmentName($_POST["equipmentName"]);
        $eqpm->setDate($_POST["date"]);
        echo $eqpm->getDate();
        $eqpm->setQuantity($_POST["quantity"]);
        $eqpm->setResourceId($_POST["resourceId"]);
        $rs = new en\resource();
        $rs->setResourceId($_POST["resourceId"]);
        $rs->setSupplierId($_POST["supplierId"]);
        $added=cont\EquipmentDBacess::saveToEquipment($eqpm,$rs);
        if($added){
            return $this->render('applicationequipmentBundle:Forms:addedSuccessfullyMessage.html.twig');
        }
        else{
            echo "not added";
            return $this->render('applicationMainBundle:Default:index.html.twig');
        }


    }
    public function addNewSupplierAction(){
        $r=cont\SupplierDBacess::getLastSupplierID();
        return $this->render('applicationequipmentBundle:Forms:addNewSupplier.html.twig',array('sid' => $r));
    }
    public function saveSupplierAction(){
        $spp = new en\Supplier();
        $spp->setSupplierId($_POST["supplierId"]);
        $spp->setName($_POST["name"]);
        $spp->setContactNo($_POST["telNo"]);
        $spp->setNic($_POST["NIC"]);
        $added = cont\SupplierDBacess::saveToSupplier($spp);
        if($added){
            return $this->render('applicationequipmentBundle:Forms:addedSuccessfullyMessage.html.twig');
        }
        else{
            echo "not added";
            return $this->render('applicationMainBundle:Default:index.html.twig');
        }
    }
}
