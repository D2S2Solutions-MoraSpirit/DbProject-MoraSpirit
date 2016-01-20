<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 17/1/16
 * Time: 11:24 AM
 */
namespace application\MainBundle\Resources\Entity;
class Supplier{
    private $supplierId;
    private $name;
    private $contactNo;
    private $Nic;

    /**
     * @return mixed
     */
    public function getContactNo()
    {
        return $this->contactNo;
    }

    /**
     * @param mixed $contactNo
     */
    public function setContactNo($contactNo)
    {
        $this->contactNo = $contactNo;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->Nic;
    }

    /**
     * @param mixed $Nic
     */
    public function setNic($Nic)
    {
        $this->Nic = $Nic;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param mixed $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}