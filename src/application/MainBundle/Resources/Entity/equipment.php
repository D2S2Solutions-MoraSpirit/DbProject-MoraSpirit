<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 11/12/15
 * Time: 4:42 AM
 */
namespace application\MainBundle\Resources\Entity;
class equipment{
    private $resource_id;
    private $supplier_id;

    public function setResource_id($r_id){
        $this->resource_id =$r_id;
    }
    public function setSupplier_id($s_id){
        $this->supplier_id =$s_id;
    }
    public function getResource_id(){
        return $this->resource_id;
    }
    public function getSupplier_id(){
        return $this->supplier_id;
    }

}
?>