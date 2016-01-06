<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 11/12/15
 * Time: 4:42 AM
 */
namespace application\MainBundle\Resources\Entity;
class equipment
{
    private $resource_id;
    private $equipmentName;
    private $quantity;
    private $date;

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resource_id;
    }

    /**
     * @param mixed $resource_id
     */
    public function setResourceId($resource_id)
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return mixed
     */
    public function getEquipmentName()
    {
        return $this->equipmentName;
    }

    /**
     * @param mixed $equipmentName
     */
    public function setEquipmentName($equipmentName)
    {
        $this->equipmentName = $equipmentName;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}
  ?>