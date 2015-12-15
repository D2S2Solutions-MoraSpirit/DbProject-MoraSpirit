<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-15
 * Time: PM 11:07
 */

namespace application\LocationsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Resources\Entity;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;

class LocationController extends Controller
{
    public function saveEquipmentAction(){

        $eqpm = new en\Location();
        $rs = new en\resource();

        $eqpm->setResourceId($_POST["resource_id"]);
        $eqpm->setType($_POST["locationtype"]);
        $eqpm->setSession($_POST["sessionlimit"]);
        $eqpm->setName($_POST["locationName"]);

        $rs->setResourceId($_POST["resource_id"]);
        $rs->setSupplierId($_POST["supplier_id"]);

        cont\LocationDBaccess::addLocation($eqpm);
        return $this->render('applicationLocationsBundle:Default:index.html.twig');




    }

    public function addAction(){
        $r=cont\LocationDBaccess::getLastResourceID();
        return $this->render('applicationLocationsBundle:Default:addlocation.html.twig',array('s' => $r));
    }
}